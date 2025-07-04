<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi'] == 'login') {
		session_start();
		include 'assets/conn/config.php';

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'");

		$cek = mysqli_num_rows($query);

		if ($cek > 0) {
			$data = mysqli_fetch_array($query);
			if ($data['level'] == 'admin') {
				$_SESSION['username'] = $username;
				header("location:admin/index.php");
			}
		} else {
			header("location:index.php?pesan=gagal");
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>SISTEM PENDUKUNG KEPUTUSAN METODE PROFILE MATCHING</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico" /> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css-login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

				<?php
				if (isset($_GET['pesan'])) {
					if ($_GET['pesan'] == 'gagal') {
						echo "<div style='margin-bottom:-1px; ' class='alert alert-danger'
							role='alert'><span class='fa fa-times'></span> Login Gagal !!!</div><br><br>";
					}
				}

				?>

				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="index.php?aksi=login">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<script src="assets/css-login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/css-login/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/css-login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/css-login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/css-login/vendor/select2/select2.min.js"></script>
	<script src="assets/css-login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/css-login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/css-login/vendor/countdowntime/countdowntime.js"></script>
	<script src="assets/css-login/js/main.js"></script>

</body>

</html>