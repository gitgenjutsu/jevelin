<?php
include_once("includes/session.php");
include_once("includes/config.php");
include('includes/user_signup_header.php');
?>

<body>
	<div class="app">
		<div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
			<div class="notification-toast top-right" id="notification-toast"></div>
			<div class="d-flex flex-column justify-content-between w-100">
				<div class="container d-flex h-100">
					<div class="row align-items-center w-100">
						<div class="col-md-7 col-lg-7 m-h-auto">
							<div class="card shadow-lg" style="border:none;">
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between m-b-30">
										<img class="img-fluid" alt="" src="assets/images/logo/logo.png">
										<h2 class="m-b-0">Sign Up</h2>
									</div>

									<?php
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$username = $_REQUEST['username'];
										$email = $_REQUEST['inputEmail'];
										$pass = $_REQUEST['inputPassword'];
										$cnfpass = $_REQUEST['inputPasswordConfirm'];

										if (!empty($username) && !empty($email) && !empty($pass) && !empty($cnfpass)) {
											if ($pass == $cnfpass) {
												$sql = "INSERT INTO users (username ,email,password) VALUES ('$username','$email','" . md5($pass) . "')";
												$result = mysqli_query($conn, $sql);
											} else {
												$result = 0;
											}
										}

										if (!$result = 0) {
											$_SESSION['username'] = $username;
											$_SESSION['userID'] = mysqli_insert_id($conn);
											header("Location:user_login.php");
										} else {
											exit();
										}
									}

									?>


									<form class="validate-form" action="" method="post" id="form-validation">
										<!-- <div class="wrap-input100 validate-input" data-validate="Valid username: ex- mohdwasim">
											<input class="input100" type="text" name="username inputRequired">
											<span class="focus-input100"></span>
											<span class="label-input100">UserName</span>
										</div>

										<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
											<input class="input100" type="text" name="email">
											<span class="focus-input100"></span>
											<span class="label-input100">Email</span>
										</div> -->

										<!-- <div class="wrap-input100 validate-input" data-validate="Password is required">
											<input class="input100" type="password" name="password">
											<span class="focus-input100"></span>
											<span class="label-input100">Password</span>
										</div>

										<div class="wrap-input100 validate-input" data-validate="Confirm password should be same">
											<input class="input100" type="password" name="cnfpassword">
											<span class="focus-input100"></span>
											<span class="label-input100">Confirm Password</span>
										</div> -->
										<div class="form-group row">
											<div class="col-sm-6">
												<input type="text" class="form-control wrap-input100" name="username" id="newUser" placeholder="Username">
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control wrap-input100" name="inputEmail" id="newEmail" placeholder="Enter your email">
											</div>
										</div>


										<div class="form-group row">
											<div class="col-sm-12">
												<input id="password" type="password" class="form-control wrap-input100" name="inputPassword" placeholder="Enter your password">
											</div>
											<div class="col-sm-12">
												<input type="password" class="form-control wrap-input100" name="inputPasswordConfirm" placeholder="Enter your password again">
											</div>
										</div>


										<div class="flex-sb-m w-full p-t-3 p-b-32">
											<div class="contact100-form-checkbox">
												<input class="input-checkbox100" id="ckb1" type="checkbox" name="inputValidCheckbox">
												<label class="label-checkbox100" for="ckb1">
													accept terms & conditions
												</label>
											</div>

											<div>
												<a href="user_login.php" class="txt1">
													Already Registered?
												</a>
											</div>
										</div>

										<div class="container-login100-form-btn">
											<button type="submit" class="login100-form-btn">
												Register
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-none d-md-flex p-h-40 justify-content-between">
					<span class="">© 2021 Jevelin</span>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a class="text-dark text-link" href="#">Legal</a>
						</li>
						<li class="list-inline-item">
							<a class="text-dark text-link" href="#">Privacy</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php
	include('includes/user_signup_footer.php');
	?>