<?php
session_start();
include_once("includes/config.php");
include('includes/user_login_header.php');
?>

<body>
	<div class="app">
		<div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
			<div class="notification-toast top-right" id="notification-toast"></div>
			<div class="d-flex flex-column justify-content-between w-100">
				<div class="container d-flex h-100">
					<div class="row align-items-center w-100">
						<div class="col-md-7 col-lg-5 m-h-auto">
							<div class="card shadow-lg" style="border:none;">
								<div class="card-body">
									<div class="d-flex align-items-center justify-content-between m-b-30">
										<img class="img-fluid" alt="" src="assets/images/logo/logo.png">
										<h2 class="m-b-0">Login</h2>
									</div>

									<form class="validate-form" id="userLoginForm" method="post">
										<div class="wrap-input100 validate-input" data-validate="Enter username">
											<input class="input100" type="text" id="username" name="username">
											<span class="focus-input100"></span>
											<span class="label-input100">UserName</span>
											<span id="nameErr"></span>
										</div>


										<div class="wrap-input100 validate-input" data-validate="Enter Password">
											<input class="input100" type="password" id="password" name="password">
											<span class="focus-input100"></span>
											<span class="label-input100">Password</span>
											<span id="passErr"></span>
										</div>

										<div class="flex-sb-m w-full p-t-3 p-b-32">
											<div class="contact100-form-checkbox">
												<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
												<label class="label-checkbox100" for="ckb1">
													Remember me
												</label>
											</div>

											<div>
												<a href="user_signup.php" class="txt1">
													Not Registered?
												</a>
											</div>
										</div>

										<div class="container-login100-form-btn">
											<button type="submit" id="loginBtn" class="login100-form-btn btn">
												<i class="anticon anticon-loading m-r-5"></i>
												Login
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