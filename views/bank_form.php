<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_bank where id_bank='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

?>

    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data Bank</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form" class="form-horizontal">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_bank'];?>" readonly>
            	<div class="modal-body"> 
               
                    <div class="form-group">
						<label class="col-sm-3 required">Nama Bank</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="namabank" value="<?php echo $hasildata['namabank'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Nomor SK.</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="nosk" value="<?php echo $hasildata['nosk'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">Alamat</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="alamat" value="<?php echo $hasildata['alamat'];?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 required">No. Telepon</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control" name="notelp" value="<?php echo $hasildata['notelp'];?>" required>
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
								<option value="#">Pilih Kelurahan/Desa</option>
							</select>
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
                url:"views/bank_form_save.php",
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