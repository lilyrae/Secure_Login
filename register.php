<!DOCTYPE html>
<html>
<head>
	<title>Secure Login: Register</title>
	<link rel="stylesheet" href="styles/main.css" />
	<script type="text/JavaScript" src="js/sha512.js"></script>
	<script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body>
	<p>Please register your details below:</p>
	<form action="includes/register_user.php" method="post" name="registry_form">
			Username:	<input type="text" name="username" /> <br/>
			Email:	<input type="email" name="email" /> <br/>
			Phone Number:	<input type="text" name="phone_num" /> <br/>
			Postcode:	<input type="text" name="postcode" /> <br/>
			Password:	<input type="password" name="password" id="password"/> <br/>
			Confirm Password:	<input type="password" name="confirm_password" id="confirm_password"/> <br/>
			<input type="button" value="Register" onclick="checkform(this.form);" />
	</form>
</body>
</html>