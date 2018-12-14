<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_sertifikat where id_sertifikat='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

$_SESSION[idsertifikat] = $_GET[id];

?>

<div class="col-md-12" style="margin-top:20px;">
	
			
			<form name="photo" id="imageUploadForm" action="views/upload_sertifikat_save.php" method="POST" data-toggle="validator" role="form" enctype="multipart/form-data">
				<fieldset>
				<legend>Data File Sertifikat</legend>
				
					<div class="form-group">
						<label class="col-sm-3 required">No. SHM</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="noshm" value="<?php echo $hasildata['noshm'];?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Luas</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="luas" value="<?php echo $hasildata['luas'];?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nama Pemilik</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="namapemilik" value="<?php echo $hasildata['namapemilik'];?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Judul File</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="judul" id="judul" value="" required>
							<input type="hidden" placeholder="" class="form-control" name="judul1" id="judul1" value="<?php echo $_GET[id];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">File Upload</label>
						<div class="col-sm-9">
							<input type="file" placeholder="" class="form-control" name="file" id="file" required>
						</div>
					</div>
				
				<!--<a class="btn btn-success" id="add" href="views/upload_file.php?id_klien=<?php echo $hasildatac['id_klien'];?>" data-toggle="ajaxModal"><i class="fa fa-upload"></i> Upload</a>-->
				<input type="submit" id="upload" name="upload" class="btn btn-success" value="Upload">
				<a class="btn btn-success" href="?page=jaminan">Kembali</a>
			</form>
			
				</p>
				<?php
				$data=mysqli_query($con,"select * from tb_sertifikat_upload where id_sertifikat='$_GET[id]'");
				
				?>
				<table class="table table-striped table-bordered table-hover" id="">
					<thead>
						<tr>
							<th style="width: 150px;">Tgl Upload</th>
							<th>Judul</th>
							<th>File</th>							
							<th width="280;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($hasildata = mysqli_fetch_array($data))
						{
							
							$no=$no+1;
							?>
							<tr>
								<td><?php echo $hasildata['tgl_upload'];?></td>
								<td><?php echo $hasildata['judul'];?></td>
								<td><?php echo $hasildata['file'];?></td>
								<td>
									
									<a class="btn btn-xs btn-primary" href="upload/jaminan/sertifikat/<?php echo $hasildata['file'];?>" target="_new"><i class="fa fa-download"></i> Download</a>
								
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</fieldset>
		
	
</div>
