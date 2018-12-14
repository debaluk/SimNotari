<?php
session_start();
error_reporting(3); 
include "../core/koneksi.php";
$namafile = $_FILES['file']['name'];
    if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../upload/jaminan/sertifikat/' . $_FILES['file']['name']))
        {
           mysqli_query($con,"insert into tb_sertifikat_upload set judul='$_POST[judul]', file ='$namafile', id_sertifikat='$_POST[judul1]'");
			
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Upload file berhasil');
		    window.location.href='../index.php?page=upload_sertifikat&id=$_POST[judul1]';
		    </script>");
        }
    }

?>
