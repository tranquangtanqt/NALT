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
				<h2><center>Đăng ký</center></h2>
				<form method="POST" action="dangky" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<fieldset class="form-group">
						<label>Tên đăng nhập</label>
						<input type="text" class="form-control" placeholder="" name="username_registration" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'username_registration')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<label>Mật khẩu</label>
						<input type="password" class="form-control" placeholder="" name="password_registration" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'password_registration')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<label>Nhập lại mật khẩu</label>
						<input type="password" class="form-control" placeholder="" name="password_registration_Again" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'password_registration_Again')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="" name="email_registration" required="">
						@if(count($errors) > 0)
							@foreach($errors->getMessages() as $key => $error )
								@if($key == 'email_registration')
								  	@foreach($error as $err)
								  		<label style="color:red">{{$err}}</label>
							  		@endforeach
						  		@endif
							@endforeach
						@endif
					</fieldset>
					<fieldset class="form-group">
						<label>Tên hiển thị</label>
						<input type="text" class="form-control" placeholder="" name="displayname_registration" required="">
					</fieldset>
					<fieldset class="form-group">
						<button type="buton" class="btn btn-success" name="registration" id="registration">Đăng ký</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>