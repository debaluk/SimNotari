<?php
$data=mysqli_query($con,"select * from tb_klien");


?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">
	
			<fieldset>
				<legend>Data Klien</legend>
				<a id="add" href="views/client_form.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Tambah Klien <i class="fa fa-plus"></i></a>
				</p>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>NIK</th>
							<th>Nama</th>
							<th>Tempat Lahir</th>
							<th width="100px">Tgl. Lahir</th>
							<th>Alamat</th>
							<th>Kelurahan/Desa</th>
							<th>Kecamatan</th>
							<th>Kabupaten/Kota</th>
							<th>Propinsi</th>
							<th>No. Telp</th>
							<th width="150px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
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
								<td><?php echo $hasildata['nik'];?></td>
								<td><?php echo $hasildata['nama'];?></td>
								<td><?php echo ucfirst($hasildata['tempat_lahir']);?></td>
								<td><?php echo $hasildata['tgl_lahir'];?></td>
								<td><?php echo $hasildata['alamat'];?></td>
								<td><?php echo ucfirst($hasildesa['nama']);?></td>
								<td><?php echo ucfirst($hasildesa['namakecamatan']);?></td>
								<td><?php echo ucfirst($hasildesa['namakabupaten']);?></td>
								<td><?php echo ucfirst($hasildesa['namaprovinsi']);?></td>
								<td><?php echo $hasildata['no_telp'];?></td>
								
								<td>
									<a class="btn btn-xs btn-primary" href="?page=client_file&id_klien=<?php echo $hasildata['id_klien'];?>" <i class="fa fa-upload"></i> Upload</a>
									<!--<a class="btn btn-xs btn-primary" id="add" href="views/upload_ktp.php?id=<?php echo $hasildata['id_klien'];?>" data-toggle="ajaxModal"><i class="fa fa-upload"></i> Upload</a>-->
									
									<a class="btn btn-xs btn-primary" id="add" href="views/client_form.php?id=<?php echo $hasildata['id_klien'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
									<!--<a class="btn btn-xs btn-primary" href="javascript: hapusdata('<?php echo $hasildata['nik'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> -->
										
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
                url:"views/client_del.php",
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