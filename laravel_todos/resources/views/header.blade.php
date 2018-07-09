<div class="container">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<a class="navbar-brand" href="index">Todos</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav pull-right">
			</ul>
			<ul class="navbar-nav ml-auto">
				@if(Auth::check())
				<li class="nav-item">
					<a class="nav-link" href="#Profile">Xin chào: {{Auth::User()->display_name}}</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dangxuat">Đăng xuất</a>
				</li>
				@else
				<li class="nav-item">
					<a class="nav-link" href="dangnhap">Đăng nhập</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dangky">Đăng ký</a>
				</li>
				@endif
			</ul>
		</div>  
	</nav>
</div>