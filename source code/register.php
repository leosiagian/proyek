<?php 
	session_start();
	include_once('function.php');
	open_page('Halaman Register');
?>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/custome.css">
</head>
<body style="background-image : url(img/form.jpg)"> 
	<div class="col-md-offset-4 login col-md-4">
		<div class="boxed" style="margin-top: 80px;">
			<form action="register.php" role="form" method="post" style="border-radius: 10px;">
				<div style="margin-top: -50px;">
					<h2 class="text-center" style="color: black; font-weight: bold;">
						Register
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
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$pengguna = "pengguna";
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);
		$bool = true;

		mysql_connect("localhost", "root", "");
		mysql_select_db("psw2_proyek");
		$query = mysql_query("SELECT * FROM t_akun");
		while($row = mysql_fetch_array($query))
		{
			$table_users = $row['username'];
			if($username == $table_users)
			{
				$bool = false;
				Print '<script>alert("Username sudah ada!");</script>';
				Print '<script>window.location.assign("login.php");</script>';
			}
		}
		if($bool)
		{
			mysql_query("INSERT INTO t_akun (username, password, email, role) VALUES ('$username', '$password', '$email', '$pengguna')");
			Print '<script>alert("Success mendaftar")</script>';
			Print '<script>window.location.assign("login.php");</script>';
		}
	}
?>