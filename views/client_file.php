<?php
$datac=mysqli_query($con,"select * from tb_klien where id_klien='$_GET[id_klien]'");
$hasildatac = mysqli_fetch_array($datac);

?>




<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data File Klien</legend>
			<form name="photo" id="imageUploadForm" action="views/upload_file_client.php" method="POST" data-toggle="validator" role="form" enctype="multipart/form-data">
				<input type="hidden" placeholder="" class="form-control" name="id_klien" id="id_klien"  value="<?php echo $_GET[id_klien];?>">
				<div class="form-group">
						<label class="col-sm-3 required">NIK</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="nik" value="<?php echo $hasildatac['nik'];?>" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nama</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="nama" value="<?php echo  $hasildatac['nama'];?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Judul File</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="judul" id="judul" value="" required>
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
				<a class="btn btn-success" href="?page=client">Kembali</a>
			</form>
				
				</p>
				<?php
				$data=mysqli_query($con,"select * from tb_klien_upload where id_klien='$_GET[id_klien]'");
				
				?>
				<table class="table table-striped table-bordered table-hover" id="">
					<thead>
						<tr>
							<th>Tgl Upload</th>
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
									
									<a class="btn btn-xs btn-primary" href="upload/klien/<?php echo $hasildata['file'];?>" target="_new"><i class="fa fa-download"></i> Download</a>
								
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</fieldset>
		
	
</div>

<script>
	
    function hapusdata(id){
        var status=confirm("Hapus Data?");
        if(status){
            $.ajax({
                url:"views/client_del.php",
                type:"POST",
                data:"id="+id,
                success:function(msg){
                    alert(msg);
                    //loaddata();
                    document.location.reload(); 
                }
            });
        }
    }
</script>