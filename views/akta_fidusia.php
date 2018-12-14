<?php
$data=mysqli_query($con,"select * from tb_user where id_user='$_SESSION[nama_id]'");
$hasildata = mysqli_fetch_array($data);

?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	<form enctype="multipart/form-data" class="bs-example form-horizontal" method="POST" action="?page=reg_onsite&co=save" >
		<input type="hidden" name="id_member" value="">
		<input type="hidden" name="no_reg" value="" />
		
			<fieldset>
				<legend>Data Notariil Jaminan Fidusia</legend>
	  
				<div class="form-group">
					<label class="col-sm-3 required">ID User</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control" name="firstname" value="<?php echo $hasildata['no_user'];?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nama</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control" name="firstname" value="<?php echo  $hasildata['nama_user'];?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3">Hak Akses</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="lastname" value="<?php echo  $hasildata['hak_akses'];?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nomor Telepone</label>
					<div class="col-sm-9">
						<input type="email" placeholder="" class="form-control"  name="email" value="<?php echo $hasildata['no_telp'];?>" readonly >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Alamat</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="phone" value="<?php echo $hasildata['alamat'];?>" readonly >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nama Pengguna</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="name_sertificate" value="<?php echo $hasildata['nama_user'];?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 required">Kata Sandi</label>
					<div class="col-sm-9">
						<input type="password" placeholder="" class="form-control"  name="name_sertificate" value="<?php echo $hasildata['kata_sandi'];?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 required">Email</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="name_sertificate" value="<?php echo $hasildata['email'];?>" readonly>
					</div>
				</div>
				</p>
				</p></p></p>
				
				<a id="add" href="views/ubah_katasandi.php" data-toggle="ajaxModal" class="btn btn-primary">Ubah Kata Sandi <i class="fa fa-arrow-circle-right"></i></a>
				
			</fieldset>
		
	</form>
</div>

