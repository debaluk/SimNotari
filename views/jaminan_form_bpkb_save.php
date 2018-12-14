<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

if ($id)
{
	mysqli_query($con,"update tb_bpkb set
	nobpkb ='$_POST[nomor]',
	id_user ='$_SESSION[nama_id]',
	kat_object ='$_POST[jenis]',
	merek ='$_POST[merek]',
	tipe ='$_POST[tipe]',
	norangka='$_POST[rangka]',
	nomesin ='$_POST[mesin]',
	namapemilik ='$_POST[namapemilik]'
	where id_bpkb='$id'");
		
	echo "Sukses Update data";
}
else
{
	mysqli_query($con,"insert into tb_bpkb set
	nobpkb ='$_POST[nomor]',
	id_user ='$_SESSION[nama_id]',
	kat_object ='$_POST[jenis]',
	merek ='$_POST[merek]',
	tipe ='$_POST[tipe]',
	norangka='$_POST[rangka]',
	nomesin ='$_POST[mesin]',
	namapemilik ='$_POST[namapemilik]'");
	
	echo "Sukses Tambah data";
}

?>