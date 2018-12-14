<?php
$data=mysqli_query($con,"select tb_fidusia.*, tb_user.*,tb_klien.nama from tb_fidusia,tb_user,tb_klien
where tb_fidusia.id_user=tb_user.id_user and tb_fidusia.nik=tb_klien.nik  and tb_fidusia.tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'  order by tb_fidusia.id_fidusia asc");


$datasum=mysqli_query($con,"select sum(biayanot) as total from tb_fidusia where tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'");
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
				<legend>Laporan Notariil Jaminan Fidusia</legend>
				
				</p>
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
							<th>NIK</th>
							<th>Nama</th>
							<th>NO BKPB/Merek</th>
						
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
								<td><?php echo $hasildata['noaktajamfud'];?></td>
								<td><?php echo $hasildata['tglakta'];?></td>
								<td><?php echo $hasildata['jnsakta'];?></td>
								<td><?php echo $hasildata['nama_pengguna'];?></td>
								<td><?php echo $hasildata['nik'];?></td>
								<td><?php echo $hasildata['nama'];?></td>
								<td><?php
								$databpkb=mysqli_query($con,"select tb_fidusia_detil.*, tb_bpkb.* from tb_fidusia_detil,tb_bpkb 
								where tb_fidusia_detil.id_bpkb=tb_bpkb.id_bpkb and tb_fidusia_detil.id_fidusia='$hasildata[id_fidusia]'");
								while ($listdatabpkb = mysqli_fetch_array($databpkb))
								{
								?>
								<?php echo $listdatabpkb['nobpkb'];?> / <?php echo $listdatabpkb['merek'];?><br>
								<?php } ?></td>
								
								<td><?php echo $hasildata['nosk'];?></td>
								<td align="right"><?php echo number_format($hasildata['hutangdebitur'] ,0,',','.')?></td>
								<td align="right"><?php echo number_format($hasildata['biayanot'] ,0,',','.')?></td>
								
							</tr>
							<?php
						}
						?>
						<tr>
								<td colspan="9" align="center">Total</td>
								
								<td align="right"><?php echo number_format($nilaitotal['total'] ,0,',','.')?></td>
								
							</tr>
					</tbody>
				</table>
				<?php } ?>
			</fieldset>
		
	
</div>
