<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";
$namafile = $_FILES['file']['name'];
    if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../upload/jaminan/bpkb/' . $_FILES['file']['name']))
        {
           
			mysqli_query($con,"insert into tb_bpkb_upload set judul='$_POST[judul]', file ='$namafile', id_bpkb='$_POST[judul1]'");
			
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Upload file berhasil');
		    window.location.href='../index.php?page=upload_bpkb&id=$_POST[judul1]';
		    </script>");
        }
    }

?>
