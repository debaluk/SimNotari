
<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">

	<form enctype="multipart/form-data" class="bs-example form-horizontal" method="POST" action="" >
		
			<fieldset>
				<legend>Data Bank</legend>
				<a id="add" href="views/bank_form.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Tambah Bank <i class="fa fa-plus"></i></a>
				</p>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>Nama Bank</th>
							<th>No. SK</th>
							<th>No. Telp.</th>
							<th>Alamat</th>
							<th>Desa/Kelurahan</th>
							<th>Kecamatan</th>
							<th>Kabupaten/Kota</th>
							<th>Propinsi</th>
							
							<th width="150;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						$data=mysqli_query($con,"select * from tb_bank order by id_bank desc");
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
								<td><?php echo $hasildata['namabank'];?></td>
								<td><?php echo $hasildata['nosk'];?></td>
								<td><?php echo $hasildata['notelp'];?></td>
								<td><?php echo $hasildata['alamat'];?></td>
								<td><?php echo $hasildesa['nama'];?></td>
								<td><?php echo $hasildesa['namakecamatan'];?></td>
								<td><?php echo $hasildesa['namakabupaten'];?></td>
								<td><?php echo $hasildesa['namaprovinsi'];?></td>
								
								<td>		
									<a class="btn btn-xs btn-primary" href="?page=bank_file&id=<?php echo $hasildata['id_bank'];?>" <i class="fa fa-upload"></i> Upload</a>							
									<a class="btn btn-xs btn-primary" id="add" href="views/bank_form.php?id=<?php echo $hasildata['id_bank'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
									<!---<a class="btn btn-xs btn-primary" href="javascript: hapusdata('<?php echo $hasildata['id_bank'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> -->
										
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</fieldset>
		
	</form>
</div>

<script>
    
    function hapusdata(id){
        var status=confirm("Hapus Data?");
        if(status){
            $.ajax({
                url:"views/bank_del.php",
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