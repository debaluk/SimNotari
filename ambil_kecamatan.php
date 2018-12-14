<?php
session_start();
error_reporting(3);
include "core/koneksi.php";

$kab=$_POST['kab'];
$query= mysqli_query($con, "SELECT * FROM kecamatan WHERE id_kab = '$kab'");
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id_kec'].'">'.$data['nama'].'</option>';
}

