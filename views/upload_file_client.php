<?php
session_start();
error_reporting(0); 
include "../core/koneksi.php";
$namafile = $_FILES['file']['name'];
    if ( $_FILES['file']['error'] > 0 ){
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        if(move_uploaded_file($_FILES['file']['tmp_name'], '../upload/klien/' . $_FILES['file']['name']))
        {
            mysqli_query($con,"insert into tb_klien_upload set judul='$_POST[judul]', file ='$namafile', id_klien='$_SESSION[id_klien]'");
			echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Upload file berhasil');
		    window.location.href='../index.php?page=client_file&id_klien=$_SESSION[id_klien]';
		    </script>");
        }
    }

?>
