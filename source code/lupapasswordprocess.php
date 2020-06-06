<?php 
	session_start();
	include_once('function.php');
	open_page('Halaman Password Baru');
?>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/custome.css">
</head>
<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	mysql_connect("localhost", "root", "");
	mysql_select_db("psw2_proyek");
	$query = mysql_query("SELECT * FROM t_akun");
	while($row = mysql_fetch_array($query)){
		$id = $row['username'];
		$e = $row['email'];
		$role = $row['role'];
		if($username == $id && $email == $e){?>
			<script type="text/javascript">
				function reload()
				{
					img = document.getElementById("capt");
					img.src="captcha_creator.php?rand_number=" + Math.random();
				}
			</script>
			<body style="background-image : url(img/form.jpg)">
				<div class="col-md-offset-4 login col-md-4">
					<div class="boxed" style="margin-top: 95px;">
						<form action="checkcaptcha.php" method="GET" style="border-radius: 10px;">
							<div style="margin-top: -50px;">
								<h2 class="text-center" style="color: black; font-weight: bold;">
									New Password
								</h2>
							</div>
							<label style="margin-top: -20px;">
								Username
							</label>
							<div class="input-group" style="margin-top: -5px;">
				  				<span class="input-group-addon" id="basic-addon1">
				  					<i class="glyphicon glyphicon-user"></i>
				  				</span>
								<input type="text" class="form-control" name="user" placeholder="Username" required="required">
							</div>
							<label style="margin-bottom: -10px;">New Password</label>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1">
									<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input type="password" class="form-control" name="newpassword" placeholder="Password" required="required">
							</div>
							<label style="margin-bottom: -10px">
								Captcha
							</label>
							<div class="input-group">
								<input type="text" class="form-control" name="t1" placeholder="Captcha" required="required">
							</div>
							<div>
								<img src="captcha_creator.php" id="capt">
								<input type="button" onClick=reload() ; value='Reload Captcha'>
							</div>
							<input style="margin-top: 20px;" type="submit" value="Kirim" class="btn btn-primary btn-block">
						</form>
					</div>	
				</div>
			</body>
		<?php
			exit;
		}
	}
	$cek = true;
	if(isset($cek)){
		Print '<script>alert("Username atau email anda Salah")</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lupapassword.php">';
	}
?>