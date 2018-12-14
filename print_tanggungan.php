<?php
session_start();
error_reporting(1);
include "core/koneksi.php";

$data=mysqli_query($con,"select tb_haktanggungan.*, tb_user.*,tb_sertifikat.* from tb_haktanggungan,tb_user,tb_sertifikat
where tb_haktanggungan.id_user=tb_user.id_user and tb_haktanggungan.noshm=tb_sertifikat.noshm and tb_haktanggungan.id_hak='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

$datab=mysqli_query($con,"select * from tb_bank where nosk='$hasildata[nosk]'");
$hasildatab = mysqli_fetch_array($datab);

?>

<table border="1" width="660" align="center" cellpadding="10" cellspacing="0">
	<tr>
		<td>
			</p>
			<div align="center"><b>SURAT KUASA MEMBEBANKAN HAK TANGGUNGAN</b><br>
			NOMOR : <?php echo $hasildata[noaktahaktang];?></div>
			</p>
			
			<table border="1" align="center" cellpadding="10" cellspacing="0" width="95%">
				<tr>
					<td align="center">
						PEMBERI KUASA
					</td>
					<td align="center">
						PENERIMA KUASA / BANK
					</td>
					
				</tr>
				<tr>
					<td align="">
						<?php
						$datanik=mysqli_query($con,"select tb_haktanggungan_detil.*, tb_klien.* from tb_haktanggungan_detil,tb_klien
						where tb_haktanggungan_detil.id_klien=tb_klien.id_klien and tb_haktanggungan_detil.id_hak='$hasildata[id_hak]'");
						while ($hasildatanik = mysqli_fetch_array($datanik))
						{
						?>
						<table>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $hasildatanik[nama];?></td>
							</tr>
							<tr>
								<td>TTL</td>
								<td>: <?php echo $hasildatanik[tempat_lahir];?>, <?php echo date('d-m-Y',strtotime($hasildatanik[tgl_lahir])) ; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $hasildatanik[alamat];?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>: <?php echo $hasildatanik[nik];?></td>
							</tr>
						</table>
						<?php } ?>
					</td>
					<td align="left" >
						<table>
							<tr>
								<td>Nama Bank</td>
								<td>: <?php echo $hasildatab[namabank];?></td>
							</tr>
							<tr>
								<td>Nomor SK</td>
								<td>: <?php echo $hasildatab[nosk];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $hasildatab[alamat];?></td>
							</tr>
						</table>
					</td>
					
				</tr>
				<tr>
					<td colspan="2">
						Untuk menjamin pelunasan hutang debitur sebesar Rp. <?php echo number_format($hasildata[hutangdebitur] ,0,',','.')?> 
						dengan jaminan berupa Sertifikat Hak Milik No :<?php echo $hasildata[noshm];?>, 
						Desa/Kelurahan : <?php echo $hasildata[desa];?>, 
						Kecamatan :<?php echo $hasildata[kecamatan];?>, 
						Kabupaten :<?php echo $hasildata[kabupaten];?>, 
						Propinsi : <?php echo $hasildata[propinsi];?>
						Luas :<?php echo $hasildata[luas];?>, 
						atas nama : <?php echo $hasildata[namapemilik];?>
						<br>
					</td>
					
				</tr>
				<tr>
					<td colspan="2">
						Dibuat di Denpasar, pada tanggal : <?php echo date('d-m-Y',strtotime($hasildata[tglakta])) ; ?> dengan saksi nama : <?php echo $hasildata[nama_pengguna];?> alamat : <?php echo $hasildata[alamat];?>
						<br>
					</td>					
				</tr>
			</table>
			</p>
			</p>
			<div align="right">
			<table border="0" cellpadding="5" cellspacing="0" width="50%" style="margin-top:100px; margin-bottom:150px;">
				<tr>
					<td align="center">
					Notaris Kota Denpasar,
					<br></p></p>
					</p>
					</p>
						</p>
							</p>
					<div style="margin-top:60px;"><strong>Putu Abdi Putra Sarjana, SH.,M.Kn</strong></div><br>
					</td>
				</tr>
			</table>
			</div>
			</p>
			</p>
			</p>
			</p>
		</td>
	</tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">   
     $(document).ready(function () {
    window.print();
});
</script>
