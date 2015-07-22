<?php

// FILTER_SANITIZE_STRING removes html tags from string (for safety - to stop people from executing functions with html tags)
//INPUT_GET finds the variable 'err'

$error = filter_input(INPUT_GET, 'err', $filer = FILTER_SANITIZE_STRING);

if (!$error) {
	$error = 'Oops! An unknown error happened.';
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Secure Login: Error</title>
		<link rel="stylesheet" href="styles/main.css" />
	</head>
	<body>
		<h1>There was a problem</h1>
		<p class="error"><?php echo $error; ?></p>
	</body>
</html>