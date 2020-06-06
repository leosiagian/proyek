<?php 
	session_start();
	include_once('function.php');
	open_page('Halaman Login');
?>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/custome.css">
</head>
<body style="background-image : url(img/form.jpg)">
	<div class="col-md-offset-4 login col-md-4">
		<div class="boxed" style="margin-top: 95px;">
			<form action="loginprocess.php" method="post" style="border-radius: 10px;">
				<div style="margin-top: -50px;">
					<h2 class="text-center" style="color: black; font-weight: bold;">
						Login
					</h2>
				</div>
				<label style="margin-top: -20px;">
					Username
				</label>
				<div class="input-group" style="margin-top: -5px;">
					<span class="input-group-addon" id="basic-addon1">
						<i class="glyphicon glyphicon-user"></i>
					</span>
					<input type="text" class="form-control" name="username" placeholder="Username" required="required">
				</div>
				<label style="margin-bottom: -10px;">
					Password
				</label>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">
						<i class="glyphicon glyphicon-lock"></i>
					</span>
					<input type="password" class="form-control" name="password" placeholder="Password" required="required">
				</div>
				<div>
					<input style="margin-top: 10px;" type="checkbox" value="remember">
					<label style="margin-left: 5px;">
						Remember Me
					</label>
				</div>
				<input style="margin-top: 10px;" type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
				<input style="margin-top: 10px;" type="reset" class="btn btn-primary btn-block" value="Reset">
				<p style="margin-top: 10px;">
					Lupa password??? 
					<a href="lupapassword.php">
						Lupa Password
					</a>
					<br>Tidak punya akun??? 
					<a href="register.php">
						Daftar disini
					</a>
				</p>
			</form>
		</div>	
	</div>
</body>
<?php 
	close_page();
?>