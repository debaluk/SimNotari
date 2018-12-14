<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

if ($id)
{
	mysqli_query($con,"update tb_haktanggungan set
	noaktahaktang ='$_POST[noaktajamfud]',
	id_user ='$_SESSION[nama_id]',
	jnsakta ='$_POST[jnsakta]',
	tglakta ='$_POST[tglakta]',
	nosk ='$_POST[nosk]',
	hutangdebitur='$_POST[hutangdebitur]',
	biayanot ='$_POST[biayanot]',
	noshm ='$_POST[noshm]'
	where id_hak='$id'");
		
	mysqli_query($con,"delete from tb_haktanggungan_detil where id_hak='$id'");
	
	$idklien = $_POST['nik'];
	$jumlah_idklien = count($idklien);
	
	for($x=0;$x<$jumlah_idklien;$x++){
		mysqli_query($con,"insert into tb_haktanggungan_detil set id_hak='$id', id_klien='$idklien[$x]'");
		
	}
	
	echo "Sukses Update data";
}
else
{
	mysqli_query($con,"insert into tb_haktanggungan set
	noaktahaktang ='$_POST[noaktajamfud]',
	id_user ='$_SESSION[nama_id]',
	jnsakta ='$_POST[jnsakta]',
	tglakta ='$_POST[tglakta]',
	nosk ='$_POST[nosk]',
	hutangdebitur='$_POST[hutangdebitur]',
	biayanot ='$_POST[biayanot]',
	noshm ='$_POST[noshm]'");

	$last_id = mysqli_insert_id($con);
	$idklien = $_POST['nik'];
	$jumlah_idklien = count($idklien);
	
	for($x=0;$x<$jumlah_idklien;$x++){
		mysqli_query($con,"insert into tb_haktanggungan_detil set id_hak='$last_id', id_klien='$idklien[$x]'");
		
	}
	
	echo "Sukses Tambah data";
}

?>