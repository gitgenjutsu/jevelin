<?php
include_once("includes/config.php");
include('includes/login_header.php');
session_start();
?>


<body style="background-color: #666666;">
	<div class="notification-toast top-right" id="notification-toast"></div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_REQUEST['username'];
					$password = $_REQUEST['password'];

					$sql = "SELECT * FROM admin WHERE username='$username' AND password='" . md5($password) . "'";
					$result = mysqli_query($conn, $sql) or die();
					$rows = mysqli_num_rows($result);

					if ($rows == 1) {
						$_SESSION['admin'] = $username;
						header("Location:products.php");
					} else {
						echo "Failed";
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


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="register.php" class="txt1">
								Not Registered?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<!--	
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
					-->
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>

	<?php include('includes/login_footer.php'); ?>