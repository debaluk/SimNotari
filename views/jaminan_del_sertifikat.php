<?php
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];

$caridd=mysqli_query($con,"select * from tb_detil_haktanggungan where noshm='$id'");
if ((mysqli_num_rows($carid) > 0) or (mysqli_num_rows($caridd) > 0))
{
	echo "Gagal hapus data, sudah digunakan";
}
else
{
	$eksekusi=mysqli_query($con,"delete from tb_sertifikat where id_sertifikat='$id'");
	if($eksekusi){
		echo "Sukses hapus data";
	}else{
		echo "Gagal hapus data";
	}
}

?>



