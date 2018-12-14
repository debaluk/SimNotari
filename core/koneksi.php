<?php
$_host = "localhost"; 	//nama server
$_name = "kedr1596_debaluk"; 		// username 
$_pass = "dedek_128#@"; 	//  standarnya kosong
$_db = "kedr1596_notaris";	// buat nama database harus sama 

$con = mysqli_connect($_host,$_name,$_pass);
if($con){
	$buka =mysqli_select_db($con,$_db);
	 if(!$buka){
		die("Oops! Database Down..."); 
	 }
}else{
	die("Oops! Server Down..., Mohon maaf kami sedang upgrade hardware.");	
}
 
?>