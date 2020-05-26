<?php
require "includes/common.php";
// Redirects the user to products page if he/she is logged in.
if (isset($_SESSION['email'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login | Life Style Store</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </head>
	<body>
		<nav >
			<?php
			include "includes/header.php";
			?>
		</nav>
		<div id="content">
			<div class="container-fluid decor_bg" id="login-panel">
				<div class="row">
					<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3">
						<div class="panel panel-primary">
							<div class="panel-heading">LOGIN</div>
								<div class="panel-body">
								  <p class="text-warning"><i>Login to make a purchase</i><p>
								<form method="POST" action="login_submit.php">
									<div class="form-group">
										<input class="form-control" type="email" name="email" placeholder="email" />
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" placeholder="Password" />
									</div>
									<div class="form-group">
										<button class=" btn btn-primary" name="submit">Login</button>
									</div>
								</form>
							</div>
                            <div class="panel-footer"><p>Don't have an account? <a href="signup.php">Register</a></p></div>
                        </div>
						<?php
							$full="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							
							if(strpos($full,"login=error")==true)
								{
								echo "<p class='red'>password or email is incorrect</p>";
								exit();
								}
							
						?>
						</div>
					</div>
				</div>
			</div>
			
		 <?php
			include 'includes/footer.php';
		?>
  </body>
</html>
