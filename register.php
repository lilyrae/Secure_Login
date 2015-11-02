<!DOCTYPE html>
<html>
<head>
	<title>Secure Login: Register</title>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' href='css/main.css'>
	<script type="text/JavaScript" src="js/sha512.js"></script>
	<script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body>
	<div class="container">
	<div class="row">
	<div class="col-md-12 main-title">
		<h3>Please register your details below:</h3>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<form class="form-horizontal" action="includes/register_user.php" method="post" name="registry_form">
		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" placeholder="Stanley Smith"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" name="email" placeholder="stanley.smith@example.co.uk"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Phone Number</label>
			<div class="col-sm-10">
				<input type="text" name="phone_num" placeholder="07765368563"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Postcode</label>
			<div class="col-sm-10">
				<input type="text" name="postcode" placeholder="SW2 0HF"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" id="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Confirm Password</label>
			<div class="col-sm-10">
				<input type="password" name="confirm_password" id="confirm_password"/>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" value="Register" onclick="checkform(this.form);" />
			</div>
		</div>
		</form>
		</div>
		<div class="col-md-4">
			<img src="http://placekitten.com/g/250/250" class="image-cats" alt"placeholder cat">
		</div>
		</div>
	</div>
</body>
</html>