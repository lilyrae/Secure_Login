<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

//To access this page, users must be logged in
if (login_check($mysqli) == true) {

} else {
	echo 'You are not authorised to access this page BITCH!';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Secure Login: Protected Page</title>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<?php if (login_check($mysqli) == true) : ?>
		<p>Helloo <?php echo htmlentities($_SESSION['username']); ?>, your ID is: <?php echo htmlentities($_SESSION['user_id']); ?>.
		Your email is: <?php echo htmlentities($_SESSION['email']); ?></p>
		<p>Return to <a href="index.php">login</a></p>
	<?php else : ?>
		<p>
			<span class="error">You are not authorised to access this page.</span> Please <a href="index.php">login</a>.
		</p>
	<?php endif; ?>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12">
	</div>
	</div>
</body>
</html>