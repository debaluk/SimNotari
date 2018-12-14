<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];


if ($id)
{
	mysqli_query($con,"update tb_klien set
	nama ='$_POST[nama]',
	tempat_lahir ='$_POST[tempatlahir]',
	tgl_lahir ='$_POST[tgllahir]',
	alamat ='$_POST[alamat]',
	no_telp ='$_POST[no_telp]',
	nik='$_POST[nik]',
	id_user ='$_SESSION[nama_id]',
	desa ='$_POST[kelurahan]',
	kecamatan ='$_POST[kecamatan]',
	kabupaten ='$_POST[kabupaten]',
	propinsi ='$_POST[provinsi]'
	where id_klien='$id'");
		
	echo "Sukses Update data";
}
else
{
	
	mysqli_query($con,"insert into tb_klien set
	nama ='$_POST[nama]',tempat_lahir ='$_POST[tempatlahir]',tgl_lahir ='$_POST[tgllahir]',	alamat ='$_POST[alamat]',no_telp ='$_POST[no_telp]',nik='$_POST[nik]',
	id_user ='$_SESSION[nama_id]',desa ='$_POST[kelurahan]',kecamatan ='$_POST[kecamatan]',kabupaten ='$_POST[kabupaten]',propinsi ='$_POST[provinsi]'");
	
	echo "Sukses Tambah data";
}

?>