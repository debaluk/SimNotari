<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_klien where id_klien='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

?>
<link href="../assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data Klien</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form" class="form-horizontal">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_klien'];?>" readonly>
            	<div class="modal-body"> 
               
                    <div class="form-group">
						<label class="col-sm-3 required">NIK</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="nik" value="<?php echo $hasildata['nik'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nama</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="nama" value="<?php echo  $hasildata['nama'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3">Tempat Lahir</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="tempatlahir" value="<?php echo  $hasildata['tempat_lahir'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Tanggal Lahir</label>
						<div class="col-sm-9">
							<input type="date" placeholder="" class="form-control"  name="tgllahir" value="<?php echo $hasildata['tgl_lahir'];?>" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Alamat</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="alamat" value="<?php echo $hasildata['alamat'];?>" required >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">No. Telepon</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="no_telp" value="<?php echo $hasildata['no_telp'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Propinsi</label>
						<div class="col-sm-9">
							<select class="form-control" id="provinsi" name="provinsi" onchange="pilih_kab(this.value);">
								<?php
								$datapropinsi=mysqli_query($con,"select * from provinsi");
								while($row = mysqli_fetch_array($datapropinsi)){
									?>
										<option value="<?php echo $row['id_prov'];?>"><?php echo $row['nama'];?></option>
									<?php									
								}								
								?>
							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Kabupaten/Kota</label>
						<div class="col-sm-9">
							<select class="form-control" id="kabupaten" name="kabupaten" onchange="pilih_kecamatan(this.value);">
								<option value="#">Pilih Kabupaten/Kota</option>
							</select>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Kecamatan</label>
						<div class="col-sm-9">
							<select class="form-control" id="kecamatan" name="kecamatan" onchange="pilih_kelurahan(this.value);">
								<option value="#">Pilih Kecamatan </option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Kelurahan/Desa</label>
						<div class="col-sm-9">
							<select class="form-control" id="kelurahan" name="kelurahan">
								<option value="#">Kelurahan/Desa</option>
							</select>
						</div>
					</div>
					
					
					
					
					
					<!--<div class="form-group">
						<label class="col-sm-3 required">Upload Photo KTP (png,jpg,jpeg)</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="file" id="file">
						</div>
					</div>-->
					
	            </div>
	            
	            <div class="modal-footer">
	                <input type="submit" Value="Simpan" class="btn btn-primary">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>              
	            </div>
            </form>
        </div>
    </div>

<script>
	$(document).ready(function() {
		$(function() {
			$("#tgllahir").datepicker({
			dateFormat:'dd-mm-yy'
			});
		});
		
		
	});
		
	$("#simpanvac").on("submit", function(){
            $.ajax({
                type:"POST",
                url:"views/client_save.php",
                data: $('#simpanvac').serialize(),
                success:function(msg){
                    alert(msg);
                    $('#ajaxModal').modal('toggle');                
                    $(".ajaxModal").bind('ajax:complete', function() {$.modal.close();});
                    window.location.reload();
				
                }

            });
        return false;
    });
	
</script>