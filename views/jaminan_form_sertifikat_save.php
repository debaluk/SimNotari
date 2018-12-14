<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

if ($id)
{
	mysqli_query($con,"update tb_sertifikat set
	noshm ='$_POST[noshm]',
	id_user ='$_SESSION[nama_id]',
	desa ='$_POST[kelurahan]',
	luas ='$_POST[luas]',
	namapemilik ='$_POST[namapemilik]',
	kecamatan='$_POST[kecamatan]',
	kabupaten ='$_POST[kabupaten]',
	propinsi ='$_POST[provinsi]'
	where id_sertifikat='$id'");
		
	echo "Sukses Update data";
}
else
{
	mysqli_query($con,"insert into tb_sertifikat set
	noshm ='$_POST[noshm]',
	id_user ='$_SESSION[nama_id]',
	desa ='$_POST[kelurahan]',
	luas ='$_POST[luas]',
	namapemilik ='$_POST[namapemilik]',
	kecamatan='$_POST[kecamatan]',
	kabupaten ='$_POST[kabupaten]',
	propinsi ='$_POST[provinsi]'");
	
	echo "Sukses Tambah data";
}

?>