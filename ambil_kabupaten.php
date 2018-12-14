<?php
session_start();
error_reporting(3);
include "core/koneksi.php";

$prop=$_POST['prop'];
$query= mysqli_query($con, "SELECT * FROM kabupaten WHERE id_prov = '$prop'");
while($data=mysqli_fetch_array($query)){
	echo '<option value="'.$data['id_kab'].'">'.$data['nama'].'</option>';
}

