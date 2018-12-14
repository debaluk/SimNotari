<?php
$data=mysqli_query($con,"select tb_haktanggungan.*, tb_user.* from tb_haktanggungan,tb_user
where  tb_haktanggungan.id_user=tb_user.id_user and tb_haktanggungan.tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'  
order by tb_haktanggungan.id_hak desc");

$datasum=mysqli_query($con,"select sum(biayanot) as total from tb_haktanggungan where tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'");
$nilaitotal = mysqli_fetch_array($datasum);

if ($_POST[tglawal] && $_POST[tglakhir]) 
{
	$tgl1 = $_POST[tglawal];
	$tgl2 = $_POST[tglakhir];
}
else
{
	
	$tgl1 = date("Y-m-d");
	$tgl2 = date("Y-m-d");
}

?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Laporan Notariil Hak Tanggungan</legend>
				
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<td align="center">
							<form action="" method="post">
							Mulai Tanggal : <input type="date" placeholder="" class="" name="tglawal" value="<?php echo $tgl1;?>" required>
							Sampai Tanggal : <input type="date" placeholder="" class="" name="tglakhir" value="<?php echo $tgl2;?>" required>
							<input type="submit" Value="Tampilkan" class="btn btn-sm btn-primary">
							</form>
						</td>
						
					</tr>
				</table>
				
				</p>
				<?php
				if ($_POST[tglawal] && $_POST[tglakhir]) 
				{
				?>
				<table class="table table-striped table-bordered table-hover" id="">
					<thead>
						<tr>
							<th>No Akta</th>
							<th>Tgl. Akta</th>
							<th>Jenis Akta</th>
							<th>User ID</th>
							<th>NIK/Nama</th>
							<th>NO. SHM</th>
							<th>No. SK</th>
							<th>Hutang Debitur</th>
							<th>Biaya Notaris</th>
							
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
								
							</tr>
							<?php
						}
						?>
						<tr>
								<td colspan="8" align="center">Total</td>
								
								<td align="right"><?php echo number_format($nilaitotal['total'] ,0,',','.')?></td>
								
							</tr>
					</tbody>
				</table>
				<?php } ?>
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