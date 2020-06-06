<?php
    session_start();
    $pw = $_GET['newpassword'];
    $uname = $_GET['user'];
    if($_GET['t1'] == $_SESSION['my_captcha'])
    {   

        mysql_connect("localhost", "root", "");
        mysql_select_db("psw2_proyek");
        $query = mysql_query("SELECT * FROM t_akun");
        while($row = mysql_fetch_array($query)){
            $nama = $row['username'];
            if($uname == $nama){
                $id = $row['id_akun'];
                mysql_query("UPDATE t_akun SET password='$pw' WHERE id_akun ='$id'");
                Print '<script>alert("Berhasil mengganti password")</script>';
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
                exit;
            }
        }
        $cek = true;
        if(isset($cek)){
            Print '<script>alert("Username tidak sesuai")</script>';
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lupapassword.php">';
            exit;
        }

    }
    else
    {
        Print '<script>alert("Captcha yang anda masukkan tidak sesuai")</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=lupapassword.php">';
    }
?>