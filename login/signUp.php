<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card h-auto">
				<div class="card-header">
					<h3>Sign Up</h3>
					<?php
					session_start();

					// Kiểm tra xem có thông báo lỗi hay không
					if (isset($_SESSION['error'])) {
						echo '
							<div class="alert alert-danger" role="alert">
								' . $_SESSION['error'] . '
							</div>
						';
						unset($_SESSION['error']); // Xóa thông báo lỗi để tránh hiển thị nhiều lần
					}
					if (isset($_SESSION['success'])) {
						echo '
							<div class="alert alert-success" role="alert">
								' . $_SESSION['success'] . '
							</div>
						';
						unset($_SESSION['success']); // Xóa thông báo lỗi để tránh hiển thị nhiều lần
					}
					?>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form action="register.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="first_name" class="form-control" placeholder="First name" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="last_name" class="form-control" placeholder="Last name" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control" placeholder="username" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control" placeholder="password" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="passwordAgain" class="form-control" placeholder="password again" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="email" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="phone" name="phone" class="form-control" placeholder="Phone" required>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Register" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">

					<div class="d-flex justify-content-center links">
						Have an account?<a href="index.php">Sing In</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="forgot-password.php">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>