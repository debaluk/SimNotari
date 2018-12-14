<?php
session_start();
include "core/koneksi.php";
$post_username	= $_POST['username'];
$post_password	= md5($_POST['password']); 
$tgl 			= date("Y-m-d H:i:s");	
//print_r($_POST);
if ($post_username)
{
	$result = mysqli_query($con, "select * from tb_user where nama_user='$post_username' and kata_sandi='$post_password'");
	$data = mysqli_num_rows($result);
	$detil = mysqli_fetch_array($result);
	if(($data)>0){
		
		$_SESSION['nama_id']		= $detil['id_user'];
		$_SESSION['nama_name']		= $detil['nama_user'];
		$_SESSION['nama_level']		= $detil['hak_akses'];
		header ("Location: index.php");
	}
	else
	{
		echo "<script>alert('Invalid User Or Password.');location='login.php';</script>";
	}
	
}
else
{
	header ("Location: login.php");
}

?>