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
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<style type="text/css">
		.txt {
			border: 1px solid;
		}
	</style>

</head>

<body>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 pt-5">
				<h2><a href="index.php" class="logo text-white">Hello, <?php echo $_SESSION['username'] ?> </a></h2>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="index.php"><span class="fa fa-home"></span> &emsp;Home</a>
					</li>
					<li>
						<a href="alternatif.php"><span class="fa fa-user-plus"></span> &emsp;Alternatif</a>
					</li>
					<li>
						<a href="kriteria.php"><span class="fa fa-list-alt"></span> &emsp;Kriteria</a>
					</li>
					<li>
						<a href="nilai.php"><span class="fa fa-file"></span> &emsp;Nilai</a>
					</li>
					<li>
						<a href="metode.php"><span class="fa fa-refresh"></span> &emsp;Metode</a>
					</li>
					<li>
						<a href="laporan.php"><span class="fa fa-print"></span> &emsp;Laporan</a>
					</li>
					<li>
						<a href="logout.php"><span class="fa fa-power-off"></span> &emsp;Logout</a>
					</li>
				</ul>

			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">

			<!-- <h2 class="mb-4">Sidebar #02</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div> -->

			<script src="../assets/css-sidebar/js/jquery.min.js"></script>
			<script src="../assets/css-sidebar/js/bootstrap.min.js"></script>
			<script src="../assets/css-sidebar/js/main.js"></script>
</body>

</html>