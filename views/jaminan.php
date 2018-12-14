<?php

$jenis=$_REQUEST[jenis];

?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data Jaminan</legend>
				
				</p>
				
				<div class="col-md-2 row">
					Jenis Jaminan 
					
				</div>
				<div class="col-md-2 row">
					<form method="post" action="">
					<select name="jenis" id="jenis" class="form-control" onchange="this.form.submit()">
					<option value="<?php echo $jenis;?>"><?php echo $jenis;?></option>
						<option value="BPKB">BPKB</option>
						<option value="Sertifikat Tanah">Sertifikat Tanah</option>
					</select>
					<form>
				</div>
				<div class="col-md-8">
					<?php
					if ($jenis=='BPKB')
					{
						?>
						<a id="add" href="views/jaminan_form_bpkb.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Tambah Jaminan BPKB <i class="fa fa-plus"></i></a>
						<?php
					}
					if ($jenis=='Sertifikat Tanah')
					{
						?>
						<a id="add" href="views/jaminan_form_sertifikat.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Tambah Jaminan Sertifikat <i class="fa fa-plus"></i></a>
						<?php
					}
					?>
					
				</div>
				<div class="row" style="margin-bottom:30px;"></div>
				
				<?php
					if ($jenis=='BPKB')
					{
						?>
						<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
								<tr>
									<th>No. BPKB</th>
									<th>Kategori Objek</th>
									<th>Merek</th>
									<th>Type</th>
									<th>No. Rangka</th>
									<th>No. Mesin</th>
									<th>Nama Pemilik</th>
									
									<th width="250;"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$data=mysqli_query($con,"select * from tb_bpkb order by id_bpkb desc");
								while ($hasildata = mysqli_fetch_array($data))
								{
									$no=$no+1;
									?>
									<tr>
										<td><?php echo $hasildata['nobpkb'];?></td>
										<td><?php echo $hasildata['kat_object'];?></td>
										<td><?php echo $hasildata['merek'];?></td>
										<td><?php echo $hasildata['tipe'];?></td>
										<td><?php echo $hasildata['norangka'];?></td>
										<td><?php echo $hasildata['nomesin'];?></td>
										<td><?php echo $hasildata['namapemilik'];?></td>
										
										<td>									
											
											<a class="btn btn-xs btn-primary" href="?page=upload_bpkb&id=<?php echo $hasildata['id_bpkb'];?>" ><i class="fa fa-upload"></i> Upload</a>
											<a class="btn btn-xs btn-primary" id="add" href="views/jaminan_form_bpkb.php?id=<?php echo $hasildata['id_bpkb'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
											
												
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>
				
						<?php
					}
					if ($jenis=='Sertifikat Tanah')
					{
						?>
						<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
								<tr>
									<th>No. SHM</th>
									<th>Desa/Kelurahan</th>
									<th>Kecamatan</th>
									<th>Kabupaten/Kota</th>
									<th>Propinsi</th>
									<th>Luas</th>
									<th>Nama Pemilik</th>
									
									<th width="250;"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$data=mysqli_query($con,"select * from tb_sertifikat order by id_sertifikat desc");
								while ($hasildata = mysqli_fetch_array($data))
								{
									//cari wilayah
										$desa=mysqli_query($con,"select kelurahan.*, kecamatan.nama as namakecamatan, kabupaten.nama as namakabupaten, provinsi.nama as namaprovinsi 
										from  
											kelurahan,kecamatan,kabupaten, provinsi  
										where 
											kelurahan.id_kec=kecamatan.id_kec
										and 
											kecamatan.id_kab=kabupaten.id_kab
										and 
											kabupaten.id_prov=provinsi.id_prov
										and 
											kelurahan.id_kel='$hasildata[desa]'");
											
										$hasildesa= mysqli_fetch_array($desa);	
										
									$no=$no+1;
									?>
									<tr>
										<td><?php echo $hasildata['noshm'];?></td>
										<td><?php echo $hasildesa['nama'];?></td>
										<td><?php echo $hasildesa['namakecamatan'];?></td>
										<td><?php echo $hasildesa['namakabupaten'];?></td>
										<td><?php echo $hasildesa['namaprovinsi'];?></td>
										<td><?php echo $hasildata['luas'];?></td>
										<td><?php echo $hasildata['namapemilik'];?></td>
										
										<td>
											<a class="btn btn-xs btn-primary" href="?page=upload_sertifikat&id=<?php echo $hasildata['id_sertifikat'];?>"><i class="fa fa-upload"></i> Upload</a>
											
											<a class="btn btn-xs btn-primary" id="add" href="views/jaminan_form_sertifikat.php?id=<?php echo $hasildata['id_sertifikat'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
											<!--<a class="btn btn-xs btn-primary" href="javascript: hapussertifikat('<?php echo $hasildata['id_sertifikat'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> -->
												
										</td>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>

						<?php
					}
					?>
					
					
					
				
			</fieldset>
		
	
</div>

<script>
    $(document).ready(function() {
		
		$('#jenis').change(function() {
			window.location = "?page=jaminan&jenis=" + $(this).val();
		});
	});
	
    function hapussertifikat(id){
        var status=confirm("Hapus data sertifikat?");
        if(status){
            $.ajax({
                url:"views/jaminan_del_sertifikat.php",
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
	
	function hapusbpkb(id){
        var status=confirm("Hapus data bpkb?");
        if(status){
            $.ajax({
                url:"views/jaminan_del_bpkb.php",
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