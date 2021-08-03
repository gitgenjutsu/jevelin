<?php
include_once("includes/config.php");
include('includes/login_header.php');
session_start();
?>


<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_REQUEST['username'];
					$email = $_REQUEST['email'];
					$pass = $_REQUEST['password'];

					$sql = "INSERT INTO admin (username ,email,password) VALUES ('$username','$email','" . md5($pass) . "')";

					$result = mysqli_query($conn, $sql);

					if ($result) {
						$_SESSION['admin'] = $username;
				?>

						<script>
							alert("Registration Success");
						</script>
					<?php
						header("Location:login.php");
					} else {
					?>
						<script>
							alert("Failed Again");
						</script>
				<?php
					}
				}
				?>


				<form class="login100-form validate-form" action="" method="post">
					<div class="img_box login100-form-title p-b-43">
						<img src="assets/images/logo/logo.png" alt="Logo" class="mx-auto" />
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid username: ex- mohdwasim">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">UserName</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>



					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>

	<?php include('includes/login_footer.php'); ?>