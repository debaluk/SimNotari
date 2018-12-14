<?php
$data=mysqli_query($con,"select tb_haktanggungan.*, tb_user.* from tb_haktanggungan,tb_user
where  tb_haktanggungan.id_user=tb_user.id_user  order by tb_haktanggungan.id_hak desc");
?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data Notariil Hak Tanggungan</legend>
				<a href="views/tanggungan_form.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Akta Baru <i class="fa fa-plus"></i></a>
				</p>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>No Akta</th>
							<th>Tgl. Akta</th>
							<th>Jenis Akta</th>
							<th>User ID</th>
							<th>NIK / Nama</th>
							
							<th>NO. SHM</th>
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
								<td><?php echo $hasildata['noaktahaktang'];?></td>
								<td><?php echo $hasildata['tglakta'];?></td>
								<td><?php echo $hasildata['jnsakta'];?></td>
								<td><?php echo $hasildata['nama_pengguna'];?></td>
								<td>
								<?php
								//cari data nik dan nama
								$datanik=mysqli_query($con,"select tb_haktanggungan_detil.*, tb_klien.* from tb_haktanggungan_detil, tb_klien
								where tb_haktanggungan_detil.id_klien=tb_klien.id_klien and tb_haktanggungan_detil.id_hak='$hasildata[id_hak]'");
								while ($listnik=mysqli_fetch_array($datanik))
								{
								    ?>
								    <?php echo $listnik['nik'];?> , <?php echo $listnik['nama'];?><br>
								    <?php
								}
								
								?>
								</td>
								<td><?php echo $hasildata['noshm'];?></td>
								<td><?php echo $hasildata['nosk'];?></td>
								<td align="right"><?php echo number_format($hasildata['hutangdebitur'] ,0,',','.')?></td>
								<td align="right"><?php echo number_format($hasildata['biayanot'] ,0,',','.')?></td>
								
								<td>									
									<a class="btn btn-xs btn-primary" href="print_tanggungan.php?id=<?php echo $hasildata['id_hak'];?>" target="_new"><i class="fa fa-print"></i> Cetak Surat</a>
									<a class="btn btn-xs btn-primary" id="add" href="views/tanggungan_form.php?id=<?php echo $hasildata['id_hak'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
									<a class="btn btn-xs btn-primary" href="javascript: hapusdata('<?php echo $hasildata['id_hak'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> 
										
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
                url:"views/tanggungan_del.php",
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