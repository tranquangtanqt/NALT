<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todos;

class TodosController extends Controller
{
    function getTodos(){
    	if(Auth::check()){
    		$user = Auth::User();
	    	$todos = Todos::where('id_user', '=', $user->id)->get();
	    	return view('index', ['todos'=>$todos]);
    	}
    	else return view('index');
    }

    function getDangXuat(){
    	Auth::logout();
    	return view('index');
    }

    function ajaxAddTodos($strAdd){
    	$todos = new Todos;
    	$todos->id_user = Auth::User()->id;
    	$todos->checked = 0;
    	$todos->content = $strAdd;
    	$todos->save();

    	$allTodos = Todos::where('id_user','=',Auth::User()->id)->get();
    	foreach($allTodos as $td){
    		if($td->checked == 1){
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\" class=\"checked\"><i class=\"fas fa-check correct i1_checked\"></i><label class=\"checked\">".$td->content."</label><i class=\"fas fa-times closes i2_checked\" onclick=\"dong(".$td->id.")\"></i></li>";
            }else{
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\"><i class=\"fas fa-check correct\"></i><label>".$td->content."</label><i class=\"fas fa-times closes\" onclick=\"dong(".$td->id.")\"></i></li>";
            }
    	}
    }

    function ajaxDeleteTodos($id){
        $todos = Todos::find($id);
        $todos->delete();

        $allTodos = Todos::where('id_user','=',Auth::User()->id)->get();
        foreach($allTodos as $td){
            if($td->checked == 1){
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\" class=\"checked\"><i class=\"fas fa-check correct i1_checked\"></i><label class=\"checked\">".$td->content."</label><i class=\"fas fa-times closes i2_checked\" onclick=\"dong(".$td->id.")\"></i></li>";
            }else{
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\"><i class=\"fas fa-check correct\"></i><label>".$td->content."</label><i class=\"fas fa-times closes\" onclick=\"dong(".$td->id.")\"></i></li>";
            }
        }
    }

    function ajaxEditContentTodos($id, $content){
        $todos = Todos::find($id);
        $todos->content = $content;
        $todos->save();

        $allTodos = Todos::where('id_user','=',Auth::User()->id)->get();
        foreach($allTodos as $td){
            if($td->checked == 1){
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\" class=\"checked\"><i class=\"fas fa-check correct i1_checked\"></i><label class=\"checked\">".$td->content."</label><i class=\"fas fa-times closes i2_checked\" onclick=\"dong(".$td->id.")\"></i></li>";
            }else{
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\"><i class=\"fas fa-check correct\"></i><label>".$td->content."</label><i class=\"fas fa-times closes\" onclick=\"dong(".$td->id.")\"></i></li>";
            }
        }
    }

    function ajaxEditCheckTodos($id){
        $todos = Todos::find($id);
        if($todos->checked == 0) $todos->checked = 1;
        else $todos->checked = 0;
        $todos->save();

        $allTodos = Todos::where('id_user','=',Auth::User()->id)->get();
        foreach($allTodos as $td){
            if($td->checked == 1){
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\" class=\"checked\"><i class=\"fas fa-check correct i1_checked\"></i><label class=\"checked\">".$td->content."</label><i class=\"fas fa-times closes i2_checked\" onclick=\"dong(".$td->id.")\"></i></li>";
            }else{
                echo "<li id='li".$td->id."' onclick=\"edit(".$td->id.");\"><i class=\"fas fa-check correct\"></i><label>".$td->content."</label><i class=\"fas fa-times closes\" onclick=\"dong(".$td->id.")\"></i></li>";
            }
        }
    }
}
