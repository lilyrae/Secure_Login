<?php

// FILTER_SANITIZE_STRING removes html tags from string (for safety - to stop people from executing functions with html tags)
//INPUT_GET finds the variable 'err'

$error = filter_input(INPUT_GET, 'err', $filer = FILTER_SANITIZE_STRING);

if (!$error) {
	$error = 'Oops! An unknown error occured.';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Secure Login: Error</title>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='css/main.css'>
	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-12-md">
				<p>There was a problem.</p>
				<p class="error"><?php echo $error; ?></p>
			</div>
			</div>
		</div>
	</body>
</html>