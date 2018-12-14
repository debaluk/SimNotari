<?php
$data=mysqli_query($con,"select tb_fidusia.*, tb_user.* from tb_fidusia,tb_user 
where  tb_fidusia.id_user=tb_user.id_user order by tb_fidusia.id_fidusia desc");
?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data Notariil Jaminan Fidusia</legend>
				<a href="views/fidusia_form.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Akta Baru <i class="fa fa-plus"></i></a>
				</p>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>No Akta</th>
							<th>Tgl. Akta</th>
							<th>Jenis Akta</th>
							<th>User ID</th>
							<th>NIK</th>
							<th>NO BKPB/Merek</th>
							
							<th>No. SK</th>
							<th>Hutang Debitur</th>
							<th>Biaya Notaris</th>
							<th width="250;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($hasildata = mysqli_fetch_array($data))
						{
							$no=$no+1;
							?>
							<tr>
								<td><?php echo $hasildata['noaktajamfud'];?></td>
								<td><?php echo $hasildata['tglakta'];?></td>
								<td><?php echo $hasildata['jnsakta'];?></td>
								<td><?php echo $hasildata['nama_pengguna'];?></td>
								<td><?php echo $hasildata['nik'];?></td>
								<td>
								
								<?php
								$databpkb=mysqli_query($con,"select tb_fidusia_detil.*, tb_bpkb.* from tb_fidusia_detil,tb_bpkb 
								where tb_fidusia_detil.id_bpkb=tb_bpkb.id_bpkb and tb_fidusia_detil.id_fidusia='$hasildata[id_fidusia]'");
								while ($listdatabpkb = mysqli_fetch_array($databpkb))
								{
								?>
								<?php echo $listdatabpkb['nobpkb'];?> / <?php echo $listdatabpkb['merek'];?><br>
								<?php } ?>
								</td>
								
								<td><?php echo $hasildata['nosk'];?></td>
								<td align="right"><?php echo number_format($hasildata['hutangdebitur'] ,0,',','.')?></td>
								<td align="right"><?php echo number_format($hasildata['biayanot'] ,0,',','.')?></td>
								
								<td>									
									<a class="btn btn-xs btn-primary" href="print_fidusia.php?id=<?php echo $hasildata['id_fidusia'];?>" target="_new"><i class="fa fa-print"></i> Cetak Surat</a>
									<a class="btn btn-xs btn-primary" id="add" href="views/fidusia_form.php?id=<?php echo $hasildata['id_fidusia'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
									<a class="btn btn-xs btn-primary" href="javascript: hapusdata('<?php echo $hasildata['id_fidusia'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> 
										
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
                url:"views/fidusia_del.php",
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