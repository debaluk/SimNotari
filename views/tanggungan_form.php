<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select tb_haktanggungan.*, tb_user.*, tb_klien.nama from tb_haktanggungan,tb_user,tb_klien
where  tb_haktanggungan.id_user=tb_user.id_user and tb_haktanggungan.id_hak='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

if ($_GET[id])
{
	$nourut = $hasildata['noaktahaktang'];
	$tgl= $hasildata['tglakta'];
}
else
{
	$querykode=mysqli_query($con,"select * from tb_fidusia where MONTH(tglakta)=MONTH(CURRENT_DATE()) and YEAR(tglakta)=YEAR(CURRENT_DATE()) order by id_fidusia desc limit 1");
	$mmaxfidusia=mysqli_num_rows($querykode);
	
	$datakode=mysqli_fetch_array($querykode);
	$kodemak=(int) substr($datakode[noaktajamfud],0,2);
	
	$querykode1=mysqli_query($con,"select * from tb_haktanggungan where MONTH(tglakta)=MONTH(CURRENT_DATE()) and YEAR(tglakta)=YEAR(CURRENT_DATE()) order by id_hak desc limit 1");
	$maxtanggungan=mysqli_num_rows($querykode1);
	
	$datakode1=mysqli_fetch_array($querykode1);
	$kodemak1=(int) substr($datakode1[noaktahaktang],0,2);
	
	
	
	if (($mmaxfidusia > 0) or ($maxtanggungan > 0))
	{
		
		if ($kodemak > $kodemak1)
		{
			$kodemak++;
			$nourut = sprintf("%02s", $kodemak);
			
		}
		if ($kodemak < $kodemak1)
		{
			$kodemak1++;
			$nourut = sprintf("%02s", $kodemak1);
		}
	}
	
	else
	{
		$nourut ='01';
	}
	
}



?>
<link rel="stylesheet" href="https//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="modal-dialog" id="modal" style="width:60%";>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data Akta Hak Tanggungan</h4>
            </div>
			
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form" class="form-horizontal">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_hak'];?>" readonly>
            	<div class="modal-body"> 
               
					<div class="form-group">
						<label class="col-sm-2 required">No Akta</label>
						<div class="col-sm-4">
							<input type="text" placeholder="" class="form-control" name="noaktajamfud" value="<?php echo $nourut;?>" readonly required>
						</div>
						<label class="col-sm-2 required">No. SHM</label>
						<div class="col-sm-4">
							<select name="noshm" id="noshm" class="form-control" required>
								<option value="<?php echo $hasildata[noshm];?>"><?php echo $hasildata[noshm];?></option>
								<?php
								$datashm=mysqli_query($con,"select * from tb_sertifikat");
								while ($listshm=mysqli_fetch_array($datashm))
								{
								?>
								<option value="<?php echo $listshm[noshm];?>"><?php echo $listshm[noshm];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 required">Tgl. Akta</label>
						<div class="col-sm-4">
							<input type="date" placeholder="" class="form-control" name="tglakta" id="tglakta" value="<?php echo $tgl;?>" required>
						</div>
						<label class="col-sm-2 required">No. SK</label>
						<div class="col-sm-4">
							<select name="nosk" id="nosk" class="form-control" required>
								<option value="<?php echo $hasildata[nosk];?>"><?php echo $hasildata[nosk];?></option>
								<?php
								$databank=mysqli_query($con,"select * from tb_bank");
								while ($listbank=mysqli_fetch_array($databank))
								{
								?>
								<option value="<?php echo $listbank[nosk];?>"><?php echo $listbank[nosk];?></option>
								<?php } ?>
							</select>
						
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 required">Jenis Akta</label>
						<div class="col-sm-4">
							<input type="text" placeholder="" class="form-control" name="jnsakta" value="Hak Tanggungan" readonly required>
						</div>
						<label class="col-sm-2 required">Hutang Debitur</label>
						<div class="col-sm-4">
							<input type="number" placeholder="" class="form-control" name="hutangdebitur" value="<?php echo $hasildata['hutangdebitur'];?>" required>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 required">Id User</label>
						<div class="col-sm-4">
							<input type="text" placeholder="" class="form-control" name="namauser" value="<?php echo $_SESSION['nama_name'];?>" readonly required>
							<input type="hidden" placeholder="" class="form-control" name="id_user" value="<?php echo $hasildata['id_user'];?>" readonly required>
						</div>
						<label class="col-sm-2 required">Biaya Notaris</label>
						<div class="col-sm-4">
							<input type="number" placeholder="" class="form-control" name="biayanot" value="<?php echo $hasildata['biayanot'];?>" required>
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-12" style="margin-top:20px">
							Pilih NIK/Nama Klien
							<table class="table" id="table-product">
								<tbody>
									<tr>
										<td width="50">
											<a href="#" class="btn btn-sm btn-danger btn-remove-product">Hapus</a>
										</td>
										<td>
											<select name="nik[]" id="nik[]" class="form-control" required>
												<option value="<?php echo $hasildata[id_klien];?>"><?php echo $hasildata[nik];?></option>
												<?php
												$dataklien=mysqli_query($con,"select * from tb_klien");
												while ($listklien=mysqli_fetch_array($dataklien))
												{
												?>
												<option value="<?php echo $listklien[id_klien];?>"><?php echo $listklien[nik];?> | <?php echo $listklien[nama];?> | <?php echo $listklien[alamat];?> </option>
												<?php } ?>
											</select>
										</td>
										
									</tr>
										
										
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">
											<a href="#" class="btn btn-sm btn-primary btn-block" id="btn-add-product">Tambah Baris Jaminan</a>
										</th>
									</tr>
								</tfoot>
							</table>
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
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script>
	
	$("#simpanvac").on("submit", function(){
            $.ajax({
                type:"POST",
                url:"views/tanggungan_save.php",
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
	
	
	$(function() {
		$("#tglakta").datepicker();
	});
		
	
	$(document).on('click', '.btn-remove-product', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();
	});

	
	$('#btn-add-product').on('click', function(e){
		e.preventDefault();
		$('#table-product').find('tbody').append(`
			<tr>
				<td width="50">
					<a href="" class="btn btn-sm btn-danger btn-remove-product">Hapus</a>
				</td>
				<td>
					
					<select name="nik[]" id="nik[]" class="form-control" required>
						<option value="<?php echo $hasildata[id_klien];?>"><?php echo $hasildata[nik];?></option>
						<?php
						$dataklien=mysqli_query($con,"select * from tb_klien");
						while ($listklien=mysqli_fetch_array($dataklien))
						{
						?>
						<option value="<?php echo $listklien[id_klien];?>"><?php echo $listklien[nik];?> | <?php echo $listklien[nama];?> | <?php echo $listklien[alamat];?> </option>
						<?php } ?>
					</select>
				</td>
				
			</tr>
		`);
	});
	
</script>