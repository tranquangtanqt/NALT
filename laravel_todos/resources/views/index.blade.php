<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ToDo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap-4.0.0/css/bootstrap.css">
	<script src="vendor/JQuery/jquery-3.3.1.min.js"></script>
	<script src="vendor/JQuery/popper.min.js"></script>
	<script src="vendor/bootstrap-4.0.0/js/bootstrap.js"></script>
</head>
<body style="background-color: #e9e9e9;">
	@include('header')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<p id="todos">todos</p>
				<div id="boder"></div>
				<i class="fas fa-angle-double-down" id="angle"></i>
				<input type="text" name="" id="inputtext" placeholder="What needs tobe done?">	
				<ul id="list">
					@if(Auth::check())
						@foreach($todos as $td)
						@if(($td->checked == 1))
							<li id="li{{$td->id}}" onclick="edit({{$td->id}});" class="checked">
								<i class="fas fa-check correct i1_checked"></i>
								<label class="checked"> {{$td->content}}</label>
								<i class="fas fa-times closes i2_checked" onclick="dong({{ $td->id }})"></i>
							</li>
						@else
							<li id="li{{$td->id}}" onclick="edit({{$td->id}});">
								<i class="fas fa-check correct"></i>
								<label> {{$td->content}}</label>
								<i class="fas fa-times closes" onclick="dong({{ $td->id }})"></i>
							</li>
						@endif
						@endforeach
					@endif
				</ul>
				<div id="footer">
					<p>Double-click to edit todo</p>
					<p>Create by ............</p>
				</div>
			</div>
		</div>
	</div>
	<script src="js/todos.js"></script>
	@if(session('thongbao'))
	<script>alert({{session('thongbao')}})</script>
	@endif
</body>
</html>