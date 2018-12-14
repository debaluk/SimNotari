<?php
include "../core/db.php";

$countaktif=mysqli_fetch_array(mysqli_query($con,"select count(id) as jumlahaktif from participants where aktive='Yes'"));

?>
<div class="col-sm-2">
				<button class="btn btn-icon btn-block">
					<i class="fa fa-group"></i>
					Users <span class="badge badge-primary"> 4 </span>
				</button>
			</div>
			<div class="col-sm-2">
				<button class="btn btn-icon btn-block">
					<i class="fa fa-tags"></i>
					Participant Register <span class="badge badge-danger"> <?php echo $countaktif;?> </span>
				</button>
			</div>
			<div class="col-sm-2">
				<button class="btn btn-icon btn-block">
					<i class="fa fa-upload"></i>
					Submit Abstract <span class="badge badge-warning"> 4 </span>
				</button>
			</div>
			<div class="col-sm-2">
				<button class="btn btn-icon btn-block">
					<i class="fa fa-upload"></i>
					Upload Full Paper <span class="badge badge-success"> 4 </span>
				</button>
			</div>
			