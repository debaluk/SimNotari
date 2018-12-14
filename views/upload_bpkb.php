<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_bpkb where id_bpkb='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

$_SESSION[idbpkb] = $_GET[id];

?>
<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data File BPKB</legend>
			<form name="photo" id="imageUploadForm" action="views/upload_bpkb_save.php" method="POST" data-toggle="validator" role="form" enctype="multipart/form-data">
				<input type="hidden" placeholder="" class="form-control" name="id_bpkb" id="id_bpkb"  value="<?php echo $_GET[id];?>">
				<div class="form-group">
						<label class="col-sm-3 required">Nomor BPKB</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="nomor" value="<?php echo  $hasildata['nobpkb'];?>"  readonly>
						</div>
					</div>
					
					
					   <div class="form-group">
						<label class="col-sm-3 required">Jenis</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="nomor" value="<?php echo $hasildata['kat_object'];?>"  readonly>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Merek</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" readonly class="form-control"  name="merek" value="<?php echo  $hasildata['merek'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3">Tipe</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" readonly class="form-control"  name="tipe" value="<?php echo  $hasildata['tipe'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nomor Rangka</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" readonly class="form-control"  name="rangka" value="<?php echo $hasildata['norangka'];?>" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nomor Mesin</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" readonly class="form-control"  name="mesin" value="<?php echo $hasildata['nomesin'];?>" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nama Pemilik</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" readonly class="form-control"  name="namapemilik" value="<?php echo $hasildata['namapemilik'];?>" required>
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
				$data=mysqli_query($con,"select * from tb_bpkb_upload where id_bpkb='$_GET[id]'");
				
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
									
									<a class="btn btn-xs btn-primary" href="upload/jaminan/bpkb/<?php echo $hasildata['file'];?>" target="_new"><i class="fa fa-download"></i> Download</a>
								
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</fieldset>
		
	
</div>
