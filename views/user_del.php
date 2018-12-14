<?php
error_reporting(0); 
include "../core/koneksi.php";

$id = $_POST['id'];


$eksekusi=mysqli_query($con,"delete from tb_user where id_user='$id'");
if($eksekusi){
	echo "Sukses hapus data";
}else{
	echo "Gagal hapus data";
}
