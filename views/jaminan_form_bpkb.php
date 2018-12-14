<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_bpkb where id_bpkb='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

?>

    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data Jaminan BPKB</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form" class="form-horizontal">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_bpkb'];?>" readonly>
            	<div class="modal-body"> 
               
					<div class="form-group">
						<label class="col-sm-3 required">Nomor BPKB</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="nomor" value="<?php echo  $hasildata['nobpkb'];?>" required>
						</div>
					</div>


				   <div class="form-group">
						<label class="col-sm-3 required">Jenis</label>
						<div class="col-sm-9">
							<select name="jenis" id="jenis" class="form-control" required>
								<option value="<?php echo $hasildata['kat_object'];?>"><?php echo $hasildata['kat_object'];?></option>
								<option value="Roda Dua">Roda Dua</option>
								<option value="Roda Empat">Roda Empat</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Merek</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="merek" value="<?php echo  $hasildata['merek'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3">Tipe</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="tipe" value="<?php echo  $hasildata['tipe'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nomor Rangka</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="rangka" value="<?php echo $hasildata['norangka'];?>" required >
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 required">Nomor Mesin</label>
						<div class="col-sm-9">
							<input type="text" placeholder="" class="form-control"  name="mesin" value="<?php echo $hasildata['nomesin'];?>" required >
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
                url:"views/jaminan_form_bpkb_save.php",
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