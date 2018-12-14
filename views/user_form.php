<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";

$data=mysqli_query($con,"select * from tb_user where id_user='$_GET[id]'");
$hasildata = mysqli_fetch_array($data);

if ($_GET[id])
{
	$nouser=$hasildata['no_user'];
}
else
{
	$querykode=mysqli_query($con,"select * from tb_user order by id_user desc limit 1");
	$datakode=mysqli_fetch_array($querykode);
	$kodemak=(int) substr($datakode[no_user], 2, 3);
	$kodemak++;
	$nouser = sprintf("%03s", $kodemak);
}


?>
    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Data User</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form">
				<input type="hidden" placeholder="" class="form-control" name="id" value="<?php echo $hasildata['id_user'];?>" readonly>
            	<div class="modal-body"> 
               
                    <div class="form-group">
					<label class="col-sm-3 required">ID User</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control" name="nomoruser" value="<?php echo $nouser;?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nama</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control" name="nama" value="<?php echo  $hasildata['nama_user'];?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3">Hak Akses</label>
					<div class="col-sm-9">
						<select id="hakakses" name="hakakses" class="form-control" required>
							<option value="<?php echo  $hasildata['hak_akses'];?>"><?php echo  $hasildata['hak_akses'];?></option>
							<option value="Super Admin">Super Admin</option>
							<option value="Admin">Admin</option>
							<option value="Notaris">Notaris</option>
							
						</select>					
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nomor Telepone</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="telp" value="<?php echo $hasildata['no_telp'];?>" required >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Alamat</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="alamat" value="<?php echo $hasildata['alamat'];?>" required >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 required">Nama Pengguna</label>
					<div class="col-sm-9">
						<input type="text" placeholder="" class="form-control"  name="pengguna" value="<?php echo $hasildata['nama_user'];?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 required">Kata Sandi</label>
					<div class="col-sm-9">
						<input type="password" placeholder="" class="form-control"  name="katasandi" value="" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 required">Email</label>
					<div class="col-sm-9">
						<input type="email" placeholder="" class="form-control"  name="email" value="<?php echo $hasildata['email'];?>" required>
					</div>
				</div>
						
	            </div>
	            <div class="row"><br></div>
	            <div class="modal-footer">
	                <input type="submit" Value="Simpan" class="btn btn-primary">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>              
	            </div>
            </form>
        </div>
    </div>
<script>
			
	$("#simpanvac").on("submit", function(){
            $.ajax({
                type:"POST",
                url:"views/user_save.php",
                data: $('#simpanvac').serialize(),
                success:function(msg){
                    alert(msg);
                    $('#ajaxModal').modal('toggle'); 
                //    $('modal').close();
                    $(".ajaxModal").bind('ajax:complete', function() {$.modal.close();});
                    window.location.reload();
                }

            });
        return false;
    });
	
	
</script>