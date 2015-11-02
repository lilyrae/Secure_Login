<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
	$logged = 'in';
} else {
	$logged = 'out';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Secure Login: Log In</title>
		<script type="text/JavaScript" src="js/sha512.js"></script>
		<script type="text/JavaScript" src="js/forms.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='css/main.css'>
	</head>
	<body>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == 1)
				echo '<p class="error">Error Logging In!</p>';

			else if ($_GET['error'] == 2)
				echo '<p class="error">You are not allowed to access. Please login here.</p>';
		}
		?>
		<div class="container text-center">
			<div class="row">
				<div class="col-md-6 main-title">
					<h1>Welcome to the Future.</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
				<!--  send the data ("action") (once button is clicked) from form to process_login.php using method post-->		
				<form class="form-inline" action="includes/process_login.php" method="post" name="login_form">
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" placeholder="hello@example.co.uk"/>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password"/>
					</div>
					<!-- On button click, use formhash function from forms.js page on passwoord and form-->
					<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
				</form>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
<?php
		if(login_check($mysqli) == true) {
			echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.';
			echo ' Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';

		} else {
			echo '<p>Currently logged ' . $logged . '.';
			echo " If you don't have an account, please <a href='register.php'>register</a>.</p>";
		}
?>
				</div>
			</div>
			<div class="row img-responsive">
				<div class="col-md-2">
					<img src="http://placekitten.com/g/150/150" class="image-cats" alt="placeholder cat">
				</div>
				<div class="col-md-2">
					<img src="http://placekitten.com/g/155/150" class="image-cats" alt"placeholder cat">
				</div>
				<div class="col-md-2">
					<img src="http://placekitten.com/g/145/150" class="image-cats" alt"placeholder cat">
				</div>
				<div class="col-md-2">
					<img src="http://placekitten.com/g/160/150" class="image-cats" alt"placeholder cat">
				</div>
			</div>
		</div>
	</body>
</html>