<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Log In | Cократитель ссылок</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- App css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
	<link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xxl-4 col-lg-5">
				<div class="card">

					<!-- Logo -->
					<div class="card-header pt-4 pb-4 text-center bg-primary">
						<a href="index.php">
							<span><img src="assets/images/logo.png" alt="" height="18"></span>
						</a>
					</div>

					<div class="card-body p-4">

						<div class="text-center w-75 m-auto">
							<h4 class="text-dark-50 text-center pb-0 fw-bold">Войти</h4>
							<p class="text-muted mb-4">Введите свой адрес электронной почты и пароль.</p>
						</div>

						<?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) { ?>
                            <p class="mb-4" style="color: red;">
                                <?php echo $_SESSION['msg']; ?>
                            </p>
                        <?php session_destroy();}; ?>

						<form action="php/main.php" method="post">

							<div class="mb-3">
								<label for="emailaddress" class="form-label">Электронной почта</label>
								<input name="email" class="form-control" type="email" id="emailaddress" required="" placeholder="Введите электронной почты">
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Пароль</label>
								<div class="input-group input-group-merge">
									<input name="password" type="password" id="password" class="form-control" placeholder="Введите ваш пароль">
									<div class="input-group-text" data-password="false">
										<span class="password-eye"></span>
									</div>
								</div>
							</div>


							<div class="mb-3 mb-0 text-center">
								<button name="login" class="btn btn-primary"  type="submit"> Войти </button>
							</div>

						</form>
					</div> <!-- end card-body -->
				</div>
				<!-- end card -->

				<div class="row mt-3">
					<div class="col-12 text-center">
						<p class="text-muted">У вас нет учетной записи? <a href="register.php" class="text-muted ms-1"><b>Зарегистрироваться</b></a></p>
					</div> <!-- end col -->
				</div>
				<!-- end row -->

			</div> <!-- end col -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</div>
<!-- end page -->

<footer class="footer footer-alt">
	2018 - 2021 © Hyper - Coderthemes.com
</footer>

<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

</body>
</html>
