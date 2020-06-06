<?php 
	session_start();
	include_once('function.php');
	open_page('Halaman Lupa Password');
?>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/custome.css">
</head>
<body style="background-image : url(img/form.jpg)"> 
	<div class="col-md-offset-4 login col-md-4">
		<div class="boxed" style="margin-top: 120px;">
			<form action="lupapasswordprocess.php" role="form" method="post" style="border-radius: 10px;">
				<div style="margin-top: -60px;">
					<h2 class="text-center" style="color: black; font-weight: bold;">
						Lupa Password
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
				<label style="margin-bottom: -10px">
					E-mail
				</label>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">
						<i class="glyphicon glyphicon-envelope"></i>
					</span>
					<input type="email" class="form-control" name="email" placeholder="E-mail" required="required">
				</div>
				<input style="margin-top: 20px;" type="submit" value="Kirim" class="btn btn-primary btn-block">
				<input style="margin-top: 10px;" type="reset" class="btn btn-primary btn-block" value="Reset">
				<p style="margin-top: 10px;">
					Kembali Login?
					<a href="Login.php">
						Login
					</a>
				</p>
			</form>
		</div>	
	</div>
</body>
<?php 
	close_page();
?>