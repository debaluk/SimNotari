<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

if ($id)
{
	mysqli_query($con,"update tb_bank set
	nosk ='$_POST[nosk]',
	id_user ='$_SESSION[nama_id]',
	namabank ='$_POST[namabank]',
	notelp ='$_POST[notelp]',
	alamat ='$_POST[alamat]',
	desa ='$_POST[kelurahan]',
	kecamatan ='$_POST[kecamatan]',
	kabupaten ='$_POST[kabupaten]',
	propinsi ='$_POST[propinsi]'
	where id_bank='$id'");
		
	echo "Sukses Update data";
}
else
{
	mysqli_query($con,"insert into tb_bank set
	nosk ='$_POST[nosk]',
	id_user ='$_SESSION[nama_id]',
	namabank ='$_POST[namabank]',
	notelp ='$_POST[notelp]',
	alamat ='$_POST[alamat]',
	desa ='$_POST[kelurahan]',
	kecamatan ='$_POST[kecamatan]',
	kabupaten ='$_POST[kabupaten]',
	propinsi ='$_POST[propinsi]'");
	
	echo "Sukses Tambah data";
}

?>