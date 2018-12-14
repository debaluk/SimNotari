<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$sandilama=md5($_POST['lama']);
$sandibaru=md5($_POST['baru']);

$result = mysqli_query($con, "select * from tb_user where nama_user='$_SESSION[nama_name]' and kata_sandi='$sandilama'");
$data = mysqli_num_rows($result);

if(($data) > 0){
	mysqli_query($con,"update tb_user set
		kata_sandi='$sandibaru' where nama_user='$_SESSION[nama_name]'");
		
	echo "Ubah kata sandi berhasil";	
}
else
{
	echo "Kata sandi lama salah";
}

?>
