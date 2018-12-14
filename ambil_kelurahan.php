<?php
session_start();
error_reporting(3);
include "core/koneksi.php";

$kec=$_POST['kec'];
$query= mysqli_query($con, "SELECT * FROM kelurahan WHERE id_kec = '$kec'");
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id_kel'].'">'.$data['nama'].'</option>';
}

