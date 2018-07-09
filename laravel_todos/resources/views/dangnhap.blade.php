<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Todos</title>
	<link rel="stylesheet" href="vendor/bootstrap-4.0.0/css/bootstrap.min.css">
</head>
<body>
	@include('header')
	<div class="container" style="margin-top: 2em;">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				@if(session('thongbaodangky'))
					<div class="alert alert-success">
						<center>{{session('thongbaodangky')}}</center>
					</div>
				@endif
				@if(session('thongbaodangnhap'))
					<div class="alert alert-danger">
						<center>{{session('thongbaodangnhap')}}</center>
					</div>
				@endif
				<h2><center>Đăng nhập</center></h2>
				<form method="POST" action="dangnhap" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" class="form-control" placeholder="" name="username_login" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'username_login')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" placeholder="" name="password_login" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'password_login')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<button type="submit" class="btn btn-success" name="login">Đăng nhập</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>