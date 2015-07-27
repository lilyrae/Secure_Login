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
		<title>Secure Login: Log In</title>
		<link rel="stylesheet" href="styles/main.css" />
		<script type="text/JavaScript" src="js/sha512.js"></script>
		<script type="text/JavaScript" src="js/forms.js"></script>
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

			<!--  send the data ("action") (once button is clicked) from form to process_login.php using method post-->		
			<form action="includes/process_login.php" method="post" name="login_form">
			Email: <input type="text" name="email" />
			Password: <input type="password" name="password" id="password"/>

			<!-- On button click, use formhash function from forms.js page on passwoord and form-->
			<input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
		</form>

<?php
		if(login_check($mysqli) == true) {
			echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
			echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';

		} else {
			echo '<p>Currently logged ' . $logged . '</p>';
			echo "<p>If you don't have a login, please <a href='register.php'>register</a>.</p>";
		}
?>

	</body>
</html>