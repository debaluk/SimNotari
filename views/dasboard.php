<?php

mysqli_query($con,"delete from tb_grafik");
$tahunini = date('Y');
?>
<div class="col-md-12">
	<div class="page-header">
		Dashboard Selamat Datang <?php echo $_SESSION['nama_name']	;?>
	</div>
		<div class="row">
			
		</div>
		<div class="row">
		<div class="panel-body">
									
									<div class="row">
										<div class="col-sm-3">
											<a href="?page=jaminan"><button class="btn btn-icon btn-block">
												<i class="fa fa-tasks"></i>
												Master Jaminan
											</button></a>
										</div>
										<div class="col-sm-3">
											<a href="?page=client"><button class="btn btn-icon btn-block">
												<i class="fa fa-group"></i>
												Master Klien
											</button></a>
										</div>
										<div class="col-sm-3">
											<a href="?page=fidusia"><button class="btn btn-icon btn-block">
												<i class="fa fa-list"></i>
												Notariil Jaminan Fidusia
											</button></a>
										</div>
										<div class="col-sm-3">
											<a href="?page=tanggunan"><button class="btn btn-icon btn-block">
												<i class="fa fa-list"></i>
												Notariil Hak Tanggungan
											</button></a>
										</div>
									</div>
									
								</div>
			
		</div>
		
		<div class="col-lg-6">
			<div align="center"> Pendapatan Jaminan Fidusia <br> Tahun <?php echo $tahunini;?> </div>
            <canvas id="myChart" width="100%" height="60"></canvas>
    
			<script src="Chart.bundle.js"></script>
		<?php
		
		$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$jlh_bln=count($bulan);
		$bulanawal=0;
		for($bln=0; $bln<$jlh_bln; $bln+=1)
		{
			$bulanawal++;
			$bln_leng=strlen($bulanawal);
			if ($bln_leng==1)
			{
				$i="0".$bulanawal;
			}
			else
			{
				$i=$bulanawal;
			}
			
			
			$bulanini =$bulan[$bln];
			$tahunini = date('Y');
			$pilihanawal=$tahunini.'-'.$i.'-01';
			$pilihanakhir=$tahunini.'-'.$i.'-31';
			
			//cari pendapatan
			$datapendapatanfudisia=mysqli_query($con," SELECT 	sum(biayanot) as pendapatan1 FROM tb_fidusia 
			WHERE tglakta BETWEEN '$pilihanawal' AND '$pilihanakhir'");
			$hasildatafudisia=mysqli_fetch_array($datapendapatanfudisia);
			
			mysqli_query($con,"insert into tb_grafik set bulan='$bulanini', tahun='$tahunini', pendapatan='$hasildatafudisia[pendapatan1]', jenis='1'");
		}

		$bulan       = mysqli_query($con, "SELECT bulan FROM tb_grafik WHERE tahun='$tahunini' and jenis='1' order by id asc");
		$penghasilan = mysqli_query($con, "SELECT pendapatan FROM tb_grafik WHERE tahun='$tahunini' and jenis='1' order by id asc");
		?>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# Pendapatan',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['pendapatan'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
		</div>
		
		
		<div class="col-lg-6">
			<div align="center"> Pendapatan Hak Tanggungan<br> Tahun <?php echo $tahunini;?> </div>
            <canvas id="myChart1" width="100%" height="60"></canvas>
    
			<script src="Chart.bundle.js"></script>
		<?php
		$bulan1=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$jlh_bln1=count($bulan1);
		$bulanawal1=0;
		for($bln1=0; $bln1<$jlh_bln1; $bln1+=1)
		{
			$bulanawal1++;
			$bln_leng1=strlen($bulanawal1);
			if ($bln_leng1==1)
			{
				$i1="0".$bulanawal1;
			}
			else
			{
				$i1=$bulanawal1;
			}
			
			
			$bulanini1 =$bulan1[$bln1];
			$tahunini1 = date('Y');
			$pilihanawal1=$tahunini1.'-'.$i1.'-01';
			$pilihanakhir1=$tahunini1.'-'.$i1.'-31';
			
			//cari pendapatan
			$datapendapatantanggungan=mysqli_query($con," SELECT 	sum(biayanot) as pendapatan2 FROM tb_haktanggungan 
			WHERE tglakta BETWEEN '$pilihanawal1' AND '$pilihanakhir1'");
			$hasildatatanggungan=mysqli_fetch_array($datapendapatantanggungan);
			
			mysqli_query($con,"insert into tb_grafik set bulan='$bulanini1', tahun='$tahunini1', pendapatan='$hasildatatanggungan[pendapatan2]', jenis='2'");
		}

		$bulan       = mysqli_query($con, "SELECT bulan FROM tb_grafik WHERE tahun='$tahunini1' and jenis='2' order by id asc");
		$penghasilan = mysqli_query($con, "SELECT pendapatan FROM tb_grafik WHERE tahun='$tahunini1' and jenis='2' order by id asc");
		?>
        <script>
            var ctx = document.getElementById("myChart1");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# Pendapatan',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['pendapatan'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
		</div>
    </div>
</div>
