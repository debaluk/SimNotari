<?php 
session_start();
error_reporting(1);
include "../core/koneksi.php";


?>
    <div class="modal-dialog" id="modal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="modalAddBrandLabel">Ubah Password</h4>
            </div>
            <form id="simpanvac" name="simpanvac"  action="" method="post" data-toggle="validator" role="form">
       
            	<div class="modal-body"> 
               
                    <div class="form-group">
							<label class="col-sm-3 control-label" for="form-field-1">Kata Sandi Lama</label>
							<div class="col-sm-9">
								<input type="" id="lama" name="lama" value="" id="form-field-1" class="form-control" required>
							
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="form-field-1">Kata Sandi Baru</label>
							<div class="col-sm-9">
								<input type="password" id="baru" name="baru" value="" id="form-field-1" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label" for="form-field-1">Ulang Kata Sandi Baru</label>
							<div class="col-sm-9">
								<input type="password" id="rebaru" name="rebaru" value="" class="form-control" required>
							</div>
						</div>
						 
	            </div>
	            <div class="row"><br></div>
	            <div class="modal-footer">
	                <input type="submit" Value="Save" class="btn btn-primary">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>              
	            </div>
            </form>
        </div>
    </div>
<script>
			
	$("#simpanvac").on("submit", function(){
            $.ajax({
                type:"POST",
                url:"views/ubah_katasandi_save.php",
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