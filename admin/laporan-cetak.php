<?php
session_start();
include '../assets/conn/config.php';
include '../assets/conn/cek.php';
?>

<!doctype html>
<html lang="en">

<head>
	<title>SISTEM PENDUKUNG KEPUTUSAN METODE PROFILE MATCHING</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../assets/css-sidebar/css/style.css">

	<link rel="stylesheet" type="text/css" href="../assets/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<style type="text/css">
.hr {
	border: none;
	height: 3px;
	background-color: none;
	margin-bottom: 5px;
	background-image: linear-gradient(to right, #000, #000 50%, transparent 50%);
}
	</style>
</head>

<body>
	<br>
	<br>
	<div class="container">
		
		<center>
			<H3>
				<b>
					LAPORAN HASIL ANALISA METODE PROFILE MATCHING
				</b>
			</H3>
			<hr class="hr">	
		</center>
		<br>
		<br>


		<table class="table tabel-bordered">
        	<thead>
            	<tr>
                	<th class="text-center">No.</th>
                	<th class="text-center">Nama Alternatif</th>
               	 	<th class="text-center">Nilai</th>
                	<th class="text-center">Rangking</th>
           	 	</tr>
        	</thead>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM tbl_alternatif ORDER BY rangking");
        $no = 1;
        while ($a = mysqli_fetch_array($data)) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>
                    <td class="text-center"><?php echo $a['nilai_pm'] ?></td>
                    <td class="text-center"><?php echo $a['rangking'] ?></td>

                </tr>
            </tbody>

        <?php } ?>
    </table>
	
	<b>
		Medan, <?php echo date('D/M/Y');?><br>
		Tdd,
		<br>
		<br>
		<br>
		...................................
	</b>
	</div>

	<script src="../assets/css-sidebar/js/jquery.min.js"></script>
	<script src="../assets/css-sidebar/js/bootstrap.min.js"></script>
	<script src="../assets/css-sidebar/js/main.js"></script>
	<script>
		window.print();
	</script>
</body>

</html>