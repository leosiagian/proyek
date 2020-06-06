<?php 
	session_start();
	include_once('function.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	mysql_connect("localhost", "root", "");
	mysql_select_db("psw2_proyek");
	$query = mysql_query("SELECT * FROM t_akun");
	while($row = mysql_fetch_array($query)){
		$role = $row['role'];
		if($username === $row["username"] && $password === $row['password']){
			if($role == "admin"){
				$_SESSION['admin'] = TRUE;
				$_SESSION['username'] = $username;
				$_SESSION['status'] = "masuk";
				Print '<script>alert("Selamat datang admin");</script>';
				Print '<script>window.location.assign("dashboard.php");</script>';
				exit;
			}
			else{
				$_SESSION['username'] = $username;
				$_SESSION['admin'] = FALSE;
				$_SESSION['status'] = "masuk";
				Print "<script>alert('Selamat datang $username');</script>";
				Print '<script>window.location.assign("dashboard.php");</script>';
				exit;
			}
		}
	}
	$eror = true;
	if(isset($eror)){
		Print '<script>alert("username / password anda salah");</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
		exit;
	}
?>