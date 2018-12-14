<?php
session_start();
error_reporting(1);
include "core/koneksi.php";

$data=mysqli_query($con,"select tb_fidusia.*, tb_user.*, tb_klien.* from tb_fidusia,tb_user, tb_klien
where  tb_fidusia.id_user=tb_user.id_user and tb_fidusia.nik=tb_klien.nik and  tb_fidusia.id_fidusia='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

$datab=mysqli_query($con,"select * from tb_bank where nosk='$hasildata[nosk]'");
$hasildatab = mysqli_fetch_array($datab);
?>

<table border="1" width="660" align="center" cellpadding="5" cellspacing="0">
	<tr>
		<td>
			</P>
			<div align="center"><b>AKTA JAMINAN FIDUSIA</b><br>
			NOMOR : <?php echo $hasildata[noaktajamfud];?></div>
			</P>
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
						<table>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $hasildata[nama];?></td>
							</tr>
							<tr>
								<td>TTL</td>
								<td>: <?php echo $hasildata[tempat_lahir];?>, <?php echo date('d-m-Y',strtotime($hasildata[tgl_lahir])) ; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>: <?php echo $hasildata[alamat];?></td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>: <?php echo $hasildata[nik];?></td>
							</tr>
						</table>
					</td>
					<td align="left">
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
						Untuk menjamin pelunasan hutang fidusia sebesar Rp. <?php echo number_format($hasildata[hutangdebitur] ,0,',','.')?> 
						dengan jaminan berupa kendaraan : <br>
						
						<?php
						$databpkb=mysqli_query($con,"select tb_fidusia_detil.*, tb_bpkb.* from tb_fidusia_detil,tb_bpkb
						where tb_fidusia_detil.id_bpkb=tb_bpkb.id_bpkb and tb_fidusia_detil.id_fidusia='$hasildata[id_fidusia]'");
						while ($hasildatabpkb = mysqli_fetch_array($databpkb))
						{
						?>
							Jenis :<?php echo $hasildatabpkb[kat_object];?>, Nomor BPKB : <?php echo $hasildatabpkb[nobpkb];?>, Merek : <?php echo $hasildatabpkb[merek];?>,
							Tipe : <?php echo $hasildatabpkb[tipe];?>, No Rangka : <?php echo $hasildatabpkb[norangka];?>, No Mesin : <?php echo $hasildatabpkb[nomesin];?>,
							Nama Pemilik : <?php echo $hasildatabpkb[namapemilik];?><br>
						
						<?php } ?>
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
			</P>
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

