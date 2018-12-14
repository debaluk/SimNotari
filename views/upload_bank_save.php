<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";
$namafile = $_FILES['file']['name'];
    if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../upload/bank/' . $_FILES['file']['name']))
        {
           
			mysqli_query($con,"insert into tb_bank_upload set judul='$_POST[judul]', file ='$namafile', id_bank='$_POST[judul1]'");
			
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Upload file berhasil');
		    window.location.href='../index.php?page=bank_file&id=$_POST[judul1]';
		    </script>");
        }
    }

?>
