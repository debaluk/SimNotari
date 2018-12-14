<?php
session_start();
error_reporting(3);
include "core/ceksesi.php";
include "core/koneksi.php";

date_default_timezone_set('Asia/Makassar');

$buka=$_GET['page'];
$buka1=$_GET['category'];
$bukaBe=ucwords($buka);
$bukaBeB=ucwords($buka1);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<title>Web Panel</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!--<meta name="theme-color" content="#2BC4F4">-->
		<!-- end: META -->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/fonts/style.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/main-responsive.css">
		
		<link rel="stylesheet" href="assets/css/theme_navy.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="assets/css/print.css" type="text/css" media="print"/>
		<!--<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css" />-->
		<link rel="stylesheet" href="assets/plugins/DataTables/media/css/DT_bootstrap.css" />
		
		<!--<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">-->
        <style>
			legend {
			display: block;
			width: auto;
			padding: 0 5px;
			margin-bottom: 0;
			font-size: inherit;
			line-height: inherit;
			border: auto;
			border-bottom: none;
			}

			fieldset {
				border: 1px groove threedface;
				padding: 15px 15px 15px 15px;
				border-color: #858585;
			}
		</style>
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
		<!-- start: HEADER -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand" href="index.php">
						<div style="color: white">Sistem Informasi Notaris Putu Abdi Putra Sarjana, SH.,M.Kn</div> 
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						
						
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<img src="assets/images/avatar-1-small.jpg" class="circle-img" alt="">
								<span class="username"><?php echo $datauserdetil[nama];?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="logout.php">
										<i class="clip-exit"></i>
										&nbsp;Log Out
									</a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<!-- start: SIDEBAR -->
				
				<div class="main-navigation navbar-collapse collapse">
					
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
						
					</div>
					
					<?php
					
					if ($_SESSION['nama_level']=='Admin')
					{
						
					?>
					<ul class="main-navigation-menu">
						<li <?php if ($buka=='') { ?>  class="active open" <?php }?>>
							<a href="index.php"><i class="clip-home "></i>
								<span class="title"> Beranda </span><i class="icon-arrow"></i>
								
							</a>
						</li>
						<li <?php if ($buka=='profile') { ?>  class="active open" <?php }?>>
							<a href="?page=profile"><i class="clip-users "></i>
								<span class="title"> Profile Pengguna </span>
								
							</a>
						</li>
						<li <?php if ($buka=='user' or $buka=='client' or $buka=='client_file' or $buka=='jaminan' or $buka=='bank' or $buka=='tracking' or $buka=='upload_bpkb' or $buka=='bank_file') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Master Data </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<!--<li>
									<a href="?page=user">
										<span class="title"> Data User </span><span><?php if ($_GET[page]='user') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>-->
								<li>
									<a href="?page=client">
										<span class="title"> Data Klien </span><span><?php if ($_GET[page]='client') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
								<li>
									<a href="?page=jaminan">
										<span class="title">Jaminan</span>
									</a>
								</li>
								<li>
									<a href="?page=bank">
										<span class="title"> Bank </span><span><?php if ($_GET['page']='bank') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<!--<li>
									<a href="?page=provinsi">
										<span class="title"> Provinsi </span><span><?php if ($_GET['page']='provinsi') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=kabupaten">
										<span class="title"> Kabupaten/Kota </span><span><?php if ($_GET['page']='kabupaten') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=desa">
										<span class="title"> Kelurahan/Desa </span><span><?php if ($_GET['page']='desa') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>-->
								
							</ul>
						</li>
						<li <?php if ($buka=='fidusia' or $buka=='tanggunan' or $buka=='akta_fidusia' or $buka=='akta_tanggunan') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Transaksi </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=fidusia">
										<span class="title"> Notariil Jaminan Fidusia </span><span><?php if ($_GET[page]='fidusia') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=tanggunan">
										<span class="title"> Notariil Hak Tanggungan</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
								
							</ul>
						</li>
						
						<li <?php if ($buka=='lap_fidusia' or $buka=='lap_tanggunan' or $buka=='lap_kas') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Laporan </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=lap_fidusia">
										<span class="title"> Lap. Notariil Jaminan Fidusia </span><span><?php if ($_GET[page]='fidusia') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_tanggunan">
										<span class="title"> Lap. Notariil Hak Tanggungan</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_kas">
										<span class="title"> Lap. Kas Masuk</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
							</ul>
						</li>
						
					</ul>
					<?php 
					}
					else if ($_SESSION['nama_level']=='Notaris')
					{
						
					?>
					<ul class="main-navigation-menu">
						<li <?php if ($buka=='lap_fidusia' or $buka=='lap_tanggunan' or $buka=='lap_kas') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Laporan </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=lap_fidusia">
										<span class="title"> Lap. Notariil Jaminan Fidusia </span><span><?php if ($_GET[page]='fidusia') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_tanggunan">
										<span class="title"> Lap. Notariil Hak Tanggungan</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_kas">
										<span class="title"> Lap. Kas Masuk</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
							</ul>
						</li>
					<?php }
					else if ($_SESSION['nama_level']=='Super Admin')
					{
					?>
					<ul class="main-navigation-menu">
						<li <?php if ($buka=='') { ?>  class="active open" <?php }?>>
							<a href="index.php"><i class="clip-home "></i>
								<span class="title"> Beranda </span><i class="icon-arrow"></i>
								
							</a>
						</li>
						<li <?php if ($buka=='profile') { ?>  class="active open" <?php }?>>
							<a href="?page=profile"><i class="clip-users "></i>
								<span class="title"> Profile Pengguna </span>
								
							</a>
						</li>
						<li <?php if ($buka=='user' or $buka=='client' or $buka=='client_file' or $buka=='jaminan' or $buka=='bank' or $buka=='tracking'  or $buka=='afiliasi') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Master Data </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=user">
										<span class="title"> Data User </span><span><?php if ($_GET[page]='user') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=client">
										<span class="title"> Data Klien </span><span><?php if ($_GET[page]='client') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
								<li>
									<a href="?page=jaminan">
										<span class="title">Jaminan</span>
									</a>
								</li>
								<li>
									<a href="?page=bank">
										<span class="title"> Bank </span><span><?php if ($_GET['page']='bank') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<!--
								<li>
									<a href="?page=provinsi">
										<span class="title"> Provinsi </span><span><?php if ($_GET['page']='provinsi') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=kabupaten">
										<span class="title"> Kabupaten/Kota </span><span><?php if ($_GET['page']='kabupaten') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=desa">
										<span class="title"> Kelurahan/Desa </span><span><?php if ($_GET['page']='desa') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>-->
								
								
							</ul>
						</li>
						<li <?php if ($buka=='fidusia' or $buka=='tanggunan' or $buka=='akta_fidusia' or $buka=='akta_tanggunan') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Transaksi </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=fidusia">
										<span class="title"> Notariil Jaminan Fidusia </span><span><?php if ($_GET[page]='fidusia') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=tanggunan">
										<span class="title"> Notariil Hak Tanggungan</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
								
							</ul>
						</li>
						
						<li <?php if ($buka=='lap_fidusia' or $buka=='lap_tanggunan' or $buka=='lap_kas') { ?>  class="active open" <?php }?>>
							<a href="javascript:void(0)"><i class="clip-book "></i>
								<span class="title"> Laporan </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="?page=lap_fidusia">
										<span class="title"> Lap. Notariil Jaminan Fidusia </span><span><?php if ($_GET[page]='fidusia') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_tanggunan">
										<span class="title"> Lap. Notariil Hak Tanggungan</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								<li>
									<a href="?page=lap_kas">
										<span class="title"> Lap. Kas Masuk</span><span><?php if ($_GET[page]='tanggunan') { echo "<span class='selected'>"; }?></span>
									</a>
								</li>
								
							</ul>
						</li>
						
					</ul>
					<?php 
					}
					else
					{
						echo "Not allow";
					}
					?>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>
				<!-- end: SIDEBAR -->
			</div>
			<!-- start: PAGE -->
			<div class="main-content">
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-home-3"></i>
									<a href="#">
										Home
									</a>
								</li>
								<?php if ($bukaBe)
								{ ?>
								<li class="active">
									<?php echo $bukaBe;?>
								</li>
								<?php } ?>
                                
							</ol>
							
						</div>
					</div>
					
					<div class="row">
						<?php
						if($buka=='profile'){
							include"views/profile.php";
						}
						else if ($buka=='user'){
							include"views/user.php";
						}
						else if ($buka=='client'){
							include"views/client.php";
						}
						else if ($buka=='client_file'){
							include"views/client_file.php";
						}
						else if ($buka=='jaminan'){
							include"views/jaminan.php";
						}
						else if ($buka=='upload_bpkb'){
							include"views/upload_bpkb.php";
						}
						else if ($buka=='upload_sertifikat'){
							include"views/upload_sertifikat.php";
						}
						else if ($buka=='bank'){
							include"views/bank.php";
						}
						else if ($buka=='bank_file'){
							include"views/bank_file.php";
						}
						else if ($buka=='fidusia'){
							include"views/fidusia.php";
						}
						else if ($buka=='tanggunan'){
							include"views/tanggungan.php";
						}
						else if ($buka=='lap_fidusia'){
							include"views/lap_fidusia.php";
						}
						else if ($buka=='lap_tanggunan'){
							include"views/lap_tanggunan.php";
						}
						else if ($buka=='lap_kas'){
							include"views/lap_kas.php";
						}
						else{
							include"views/dasboard.php";
						}
						?>
						
						
					</div>
					
					<div id="ajaxModal"></div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2018 &copy; SisNotaris
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  -->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		
		
		<script src="assets/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<script src="assets/plugins/less/less-1.5.0.min.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="assets/js/main.js"></script
		<script src="assets/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="assets/js/table-data.js"></script> 
		
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
				//FormElements.init();
			});
			
            
			$("#add").click(function(){
			//	//bersihkan form
				$('.modal').on('hidden.bs.modal', function(){
					$(this).find('form')[0].reset();
				});
			});
			
			$('[data-toggle="ajaxModal"]').on('click',function(e){
					$('#ajaxModal').remove();
					e.preventDefault();
					var $this = $(this)
					  , $remote = $this.data('remote') || $this.attr('href')
					  , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
					$('body').append($modal);
					$modal.modal({backdrop: 'static', keyboard: false});
					$modal.load($remote);
				}
			);
			
			function pilih_kab(prop)			
			{
				$.ajax({
					url: 'ambil_kabupaten.php',
					data : 'prop='+prop,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#kabupaten').html(response);
					}
				});
			}
			
			function pilih_kecamatan(kab)			
			{
				$.ajax({
					url: 'ambil_kecamatan.php',
					data : 'kab='+kab,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#kecamatan').html(response);
					}
				});
			}
			
			function pilih_kelurahan(kec)			
			{
				$.ajax({
					url: 'ambil_kelurahan.php',
					data :'kec='+kec,
					type: "post", 
					dataType: "html",
					timeout: 10000,
					success: function(response){
						$('#kelurahan').html(response);
					}
				});
			}
			
			
			
		</script>
		
		
	</body>
	<!-- end: BODY -->
</html>