<?php
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

$sandi=md5($_POST['katasandi']);

if ($id)
{
	if ($_POST['katasandi'])
	{
		mysqli_query($con,"update tb_user set
		nama_user ='$_POST[nama]',
		hak_akses ='$_POST[hakakses]',
		no_telp ='$_POST[telp]',
		alamat ='$_POST[alamat]',
		nama_pengguna ='$_POST[pengguna]',
		kata_sandi='$sandi',
		email ='$_POST[email]' where id_user='$id'");
		
	}
	else
	{
		mysqli_query($con,"update tb_user set
		nama_user ='$_POST[nama]',
		hak_akses ='$_POST[hakakses]',
		no_telp ='$_POST[telp]',
		alamat ='$_POST[alamat]',
		nama_pengguna ='$_POST[pengguna]',
		email ='$_POST[email]' where id_user='$id'");
	}
	
		
	echo "Sukses Update data";
}
else
{
	mysqli_query($con,"insert into tb_user set
	no_user ='$_POST[nomoruser]',
	nama_user ='$_POST[nama]',
	hak_akses ='$_POST[hakakses]',
	no_telp ='$_POST[telp]',
	alamat ='$_POST[alamat]',
	nama_pengguna ='$_POST[pengguna]',
	kata_sandi ='$sandi',
	email ='$_POST[email]'");
	
	echo "Sukses Tambah data";
}

?>