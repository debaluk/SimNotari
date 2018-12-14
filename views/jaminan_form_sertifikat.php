<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_sertifikat where id_sertifikat='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

?>

    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data Jaminan Sertifikat</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form" class="form-horizontal">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_sertifikat'];?>" readonly>
            	<div class="modal-body"> 
               
                    <div class="form-group">
						<label class="col-sm-3 required">No. SHM</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="noshm" value="<?php echo $hasildata['noshm'];?>" required>
						</div>
					</div>
					
					<!--<div class="form-group">
						<label class="col-sm-3 required">Desa / Kelurahan</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="desa" value="<?php echo  $hasildata['desa'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3">Kecamatan</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="kecamatan" value="<?php echo  $hasildata['kecamatan'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Kabupaten</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="kabupaten" value="<?php echo $hasildata['kabupaten'];?>" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Propinsi</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="propinsi" value="<?php echo $hasildata['propinsi'];?>" required >
						</div>
					</div>
					-->
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
								<option value="#">Pilih Kelurahan/Desa</option>
							</select>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-3 required">Luas</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="luas" value="<?php echo $hasildata['luas'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nama Pemilik</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="namapemilik" value="<?php echo $hasildata['namapemilik'];?>" required>
						</div>
					</div>
				
	            </div>
	            
	            <div class="modal-footer">
	                <input type="submit" Value="Simpan" class="btn btn-primary">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>              
	            </div>
            </form>
        </div>
    </div>

<script>
	
	$("#simpanvac").on("submit", function(){
            $.ajax({
                type:"POST",
                url:"views/jaminan_form_sertifikat_save.php",
                data: $('#simpanvac').serialize(),
                success:function(msg){
                    alert(msg);
                    $('#ajaxModal').modal('toggle'); 
                //    $('modal').close();
                    $(".ajaxModal").bind('ajax:complete', function() {$.modal.close();});
                    window.location.reload();
                }

            });
        return false;
    });
	
</script>