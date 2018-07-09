<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    function postDangNhap(Request $request){
    	$this->validate($request, 
    		[
    			'username_login'=>'min:3|max:100',
    			'password_login'=>'min:3|max:100'
    		], 
    		[
    			'username_login.min'=>'Tên đăng nhập phải có ít nhất 3 ký tự',
    			'username_login.max'=>'Tên đăng nhập phải có nhiều nhất 100 ký tự',
    			'password_login.min'=>'Pasword phải có ít nhất 3 ký tự',
    			'password_login.max'=>'Pasword  phải có nhiều nhất 100 ký tự'
    		]);

    	if(Auth::attempt(['name'=>$request->username_login, 'password'=>$request->password_login])){
    		return redirect('index')->with('thongbao', 'Đăng nhập thành công');
    	}else{
    		if(Auth::attempt(['email'=>$request->username_login, 'password'=>$request->password_login])){
    		return redirect('index')->with('thongbao', 'Đăng nhập thành công');
    		}
    		else{
    			return redirect('dangnhap')->with('thongbaodangnhap','Tên đăng nhập hoặc mật khẩu không đúng');
    		}
    	}
    }

    function postDangKy(Request $request){
        $this->validate($request, 
            [
                'username_registration'=>'unique:users,name|min:3|max:100',
                'password_registration'=>'min:3|max:100',
                'password_registration_Again'=>'same:password_registration',
                'email_registration'=>'unique:users,email',
            ], 
            [
                'username_registration.unique'=>"Tên đăng nhập đã tồn tại",
                'username_registration.min'=>'Tên đăng nhập phải có ít nhất 3 ký tự',
                'username_registration.max'=>'Tên đăng nhập phải có nhiều nhất 100 ký tự',
                'password_registration.min'=>'Pasword phải có ít nhất 3 ký tự',
                'password_registration.max'=>'Pasword  phải có nhiều nhất 100 ký tự',
                'password_registration_Again.same'=>'Mật khẩu nhập lại chưa khớp',
                'email_registration.unique'=>"Email đã tồn tại"
            ]);

        $user = new User;
        $user->name = $request->username_registration;
        $user->email = $request->email_registration;
        $user->password = bcrypt($request->password_registration);
        $user->display_name = $request->displayname_registration;
        $user->save();

        return redirect('dangnhap')->with('thongbaodangky','Chúc mừng bạn đã đăng ký thành công.Vui lòng đăng nhập để vào todos');
    }
}
