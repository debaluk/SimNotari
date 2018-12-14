<?php
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];
$eksekusi=mysqli_query($con,"delete from tb_fidusia where id_fidusia='$id'");
if($eksekusi){
	mysqli_query($con,"delete from tb_fidusia_detil where id_fidusia='$id'");
	echo "Sukses hapus data";
}else{
	echo "Gagal hapus data";
}


?>



