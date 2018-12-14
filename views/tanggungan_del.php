<?php
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];
$eksekusi=mysqli_query($con,"delete from tb_haktanggungan where id_hak='$id'");
if($eksekusi){
	mysqli_query($con,"delete from tb_haktanggungan_detil where id_hak='$id'");
	echo "Sukses hapus data";
}else{
	echo "Gagal hapus data";
}


?>



