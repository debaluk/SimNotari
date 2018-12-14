<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

if ($id)
{
	mysqli_query($con,"update tb_fidusia set
	noaktajamfud ='$_POST[noaktajamfud]',
	id_user ='$_SESSION[nama_id]',
	nosk ='$_POST[nosk]',
	nik ='$_POST[nik]',
	jnsakta ='$_POST[jnsakta]',
	tglakta ='$_POST[tglakta]',
	hutangdebitur='$_POST[hutangdebitur]',
	biayanot ='$_POST[biayanot]' where id_fidusia='$id'");
	
	mysqli_query($con,"delete from tb_fidusia_detil where id_fidusia='$id'");

	$idbpkb = $_POST['nobpkb'];
	$jumlah_idbpkb = count($idbpkb);
	
	for($x=0;$x<$jumlah_idbpkb;$x++){
		mysqli_query($con,"insert into tb_fidusia_detil set id_fidusia='$id', id_bpkb='$idbpkb[$x]'");
		
	}
	
	echo "Sukses Update data";
}
else
{
	
	mysqli_query($con,"insert into tb_fidusia set
	noaktajamfud ='$_POST[noaktajamfud]',
	id_user ='$_SESSION[nama_id]',
	nosk ='$_POST[nosk]',
	nik ='$_POST[nik]',
	jnsakta ='$_POST[jnsakta]',
	tglakta ='$_POST[tglakta]',
	hutangdebitur='$_POST[hutangdebitur]',
	biayanot ='$_POST[biayanot]'");
	
	$last_id = mysqli_insert_id($con);
	$idbpkb = $_POST['nobpkb'];
	$jumlah_idbpkb = count($idbpkb);
	
	for($x=0;$x<$jumlah_idbpkb;$x++){
		mysqli_query($con,"insert into tb_fidusia_detil set id_fidusia='$last_id', id_bpkb='$idbpkb[$x]'");
		
	}
	
	echo "Sukses simpan data";
	//echo $jumlah_idbpkb;
}

?>