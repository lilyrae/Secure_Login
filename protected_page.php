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
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<?php if (login_check($mysqli) == true) : ?>
		<p>Helloo <?php echo htmlentities($_SESSION['username']); ?>, your ID is: <?php echo htmlentities($_SESSION['user_id']); ?> and your email is: <?php echo htmlentities($_SESSION['email']); ?></p>
		<p>Return to <a href="index.php">login</a></p>
	<?php else : ?>
		<p>
			<span class="error">You are not authorised to access this page.</span> Please <a href="index.php">login</a>.
		</p>
	<?php endif; ?>
</body>
</html>