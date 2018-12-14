<?php
//cari data
if ($_POST[tglawal] && $_POST[tglakhir]) 
{
	$tgl1 = $_POST[tglawal];
	$tgl2 = $_POST[tglakhir];
	
	mysqli_query($con,"delete from tb_laporan");
	
	$data=mysqli_query($con,"select tb_fidusia.*, tb_user.* from tb_fidusia,tb_user 
	where tb_fidusia.id_user=tb_user.id_user and tb_fidusia.tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]' order by tb_fidusia.id_fidusia asc");
	while ($hasilcaria=mysqli_fetch_array($data))
	{
		mysqli_query($con,"insert into tb_laporan set
		id_akta ='$hasilcaria[id_fidusia]',
		noakta ='$hasilcaria[noaktajamfud]',
		id_user ='$hasilcaria[id_user]',
		nosk ='$hasilcaria[nosk]',
		nik ='$hasilcaria[nik]',
		jnsakta ='$hasilcaria[jnsakta]',
		tglakta ='$hasilcaria[tglakta]',
		hutangdebitur='$hasilcaria[hutangdebitur]',
		biayanot ='$hasilcaria[biayanot]',
		nobpkb ='$hasilcaria[nobpkb]',
		merk ='$hasilcaria[merk]', noshm ='-'");
			
	}
	
	$data1=mysqli_query($con,"select tb_haktanggungan.*, tb_user.*, tb_klien.nama from tb_haktanggungan,tb_user,tb_klien
	where  tb_haktanggungan.id_user=tb_user.id_user and tb_haktanggungan.tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]' group by tb_haktanggungan.noaktahaktang
	order by tb_haktanggungan.id_hak desc");
	while ($hasilcaria1=mysqli_fetch_array($data1))
	{
		mysqli_query($con,"insert into tb_laporan set
		id_akta ='$hasilcaria1[id_hak]',
		noakta ='$hasilcaria1[noaktahaktang]',
		id_user ='$hasilcaria1[id_user]',
		nosk ='$hasilcaria1[nosk]',
		nik ='$hasilcaria1[nik]',
		jnsakta ='$hasilcaria1[jnsakta]',
		tglakta ='$hasilcaria1[tglakta]',
		hutangdebitur='$hasilcaria1[hutangdebitur]',
		biayanot ='$hasilcaria1[biayanot]',
		nobpkb ='-',
		merk ='-', noshm ='$hasilcaria1[noshm]'");
			
	}
}
else
{
	$tgl1 = date("Y-m-d");
	$tgl2 = date("Y-m-d");
}


$datalap=mysqli_query($con,"select tb_laporan.*, tb_user.* from tb_laporan,tb_user
where tb_laporan.id_user=tb_user.id_user and tb_laporan.tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'  order by tb_laporan.noakta asc");


$datasum=mysqli_query($con,"select sum(biayanot) as total from tb_laporan where tglakta between '$_POST[tglawal]' and '$_POST[tglakhir]'");
$nilaitotal = mysqli_fetch_array($datasum);

?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Laporan Kas Masuk</legend>
				
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
							<th>NIK/NAMA</th>
							
							<th>NO BKPB/MEREK</th>
							
							<th>No. SHM</th>
							<th>No. SK</th>
							<th>Hutang Debitur</th>
							<th>Biaya Notaris</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						while ($hasildata = mysqli_fetch_array($datalap))
						{
							$no=$no+1;
							?>
							<tr>
								<td><?php echo $hasildata['noakta'];?></td>
								<td><?php echo $hasildata['tglakta'];?></td>
								<td><?php echo $hasildata['jnsakta'];?></td>
								<td><?php echo $hasildata['nama_pengguna'];?></td>
								<td>
								<?php
								if ($hasildata['jnsakta']=='Jaminan Fidusia')
								{
									//cari data nik dan nama
									$datanik=mysqli_query($con,"select * from tb_klien
									where nik='$hasildata[nik]'");
									while ($listnik=mysqli_fetch_array($datanik))
									{
										?>
										<?php echo $listnik['nik'];?> , <?php echo $listnik['nama'];?><br>
										<?php
									}
								}
								else
								{
									//cari data nik dan nama
									$datanik=mysqli_query($con,"select tb_haktanggungan_detil.*, tb_klien.* from tb_haktanggungan_detil, tb_klien
									where tb_haktanggungan_detil.id_klien=tb_klien.id_klien and tb_haktanggungan_detil.id_hak='$hasildata[id_akta]'");
									while ($listnik=mysqli_fetch_array($datanik))
									{
										?>
										<?php echo $listnik['nik'];?> , <?php echo $listnik['nama'];?><br>
										<?php
									}
								}
							
								?>
								</td>
								
								<td>
									<?php
									if ($hasildata['jnsakta']!='Jaminan Fidusia')
									{
										echo "-";
									}
									else
									{
										$databpkb=mysqli_query($con,"select tb_fidusia_detil.*, tb_bpkb.* from tb_fidusia_detil,tb_bpkb 
										where tb_fidusia_detil.id_bpkb=tb_bpkb.id_bpkb and tb_fidusia_detil.id_fidusia='$hasildata[id_akta]'");
										while ($listdatabpkb = mysqli_fetch_array($databpkb))
										{
										?>
										<?php echo $listdatabpkb['nobpkb'];?> / <?php echo $listdatabpkb['merek'];?><br>
										<?php } ?>
									<?php } ?>
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
								<td colspan="9" align="center">Total</td>
								
								<td align="right"><?php echo number_format($nilaitotal['total'] ,0,',','.')?></td>
								
							</tr>
					</tbody>
				</table>
				<?php } ?>
			</fieldset>
		
	
</div>
