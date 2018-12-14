<?php
$data=mysqli_query($con,"select * from tb_user");


?>


<style>
.form-group{margin-bottom:3px;}
.btn-small{padding:2px 5px;}
</style>

<div class="col-md-12" style="margin-top:20px;">

	<form enctype="multipart/form-data" class="bs-example form-horizontal" method="POST" action="?page=reg_onsite&co=save" >
		
			<fieldset>
				<legend>Data User</legend>
				<a id="add" href="views/user_form.php" data-toggle="ajaxModal"  class="btn btn-sm btn-green">Tambah User <i class="fa fa-plus"></i></a>
				</p>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>ID User</th>
							<th>Nama User</th>
							<th>Hak Akses</th>
							<th>No. Telepon</th>
							<th>Alamat</th>
							<th>User Name</th>
							<!--<th>Kata Sandi</th>-->
							<th>Email</th>
							<th width="150px;"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($hasildata = mysqli_fetch_array($data))
						{
							$no=$no+1;
							?>
							<tr>
								<td><?php echo $hasildata['no_user'];?></td>
								<td><?php echo $hasildata['nama_user'];?></td>
								<td><?php echo $hasildata['hak_akses'];?></td>
								<td><?php echo $hasildata['no_telp'];?></td>
								<td><?php echo $hasildata['alamat'];?></td>
								<td><?php echo $hasildata['nama_pengguna'];?></td>
								<!--<td><?php echo $hasildata['kata_sandi'];?></td>-->
								<td><?php echo $hasildata['email'];?></td>
								<td>
									<?php
									//if ($hasildata['hak_akses']!='Admin')
									//{
										?>
										<a class="btn btn-xs btn-primary" id="add" href="views/user_form.php?id=<?php echo $hasildata['id_user'];?>" data-toggle="ajaxModal"><i class="fa fa-pencil"></i> Ubah</a>
										<!--<a class="btn btn-xs btn-primary" href="javascript: hapusdata('<?php echo $hasildata['id_user'];?>')"><i class="fa fa-trash-o"></i> Hapus</a> -->
										<?php
									//}
									
									?>
									
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
                url:"views/user_del.php",
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