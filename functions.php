<?php
include_once 'psl-config.php';

function sec_session_start() {
	$session_name = 'sec_session_id';
	$secure = SECURE; // stops javascript accessing session ID
	$httponly = true; 

	// forces session to only use cookies
	// '===' true if a == b and they're the same type
	if(ini_set('session.use_only_cookies', 1) === FALSE) {
		header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
		exit();
	}

	// gets current cookies parameters
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"],
		$cookieParams["path"],
		$cookieParams["domain"],
		$secure,
		$httponly);

	session_name($session_name)
	session_start(); // starts php session
	session_regenerate_id(true);
}



function login($email, $password, $mysqli) {
	// using prepared statements prevents hackers injecting code into SQL (SQL injection)

	//prepared statment (SQL query) ($stmt)
	if ($stmt = $mysqli ->prepare("SELECT id, username, password, salt
	FROM members
	WHERE email = ?
	LIMIT 1")) {

		$stmt ->bind_param('s',$email); // binds empty email variable to prepared statement
		$stmt ->execute(); //execute prepared SQL query
		$stmt ->store_result();

		// get result from query
		$stmt ->bind_result($user_id, $username, $db_password, $salt); // binds empty variables to result from prepared statement
		$stmt ->fetch(); //fetches results of prepared statement

		// hash the password with the unique salt
		// sha512 is a secure hash algorithm
		$password = hash('sha512', $password . $salt);

		if ($stmt ->num_rows == 1) {
			// if user account exists, check if account is locked from too many login attempts

			if (checkbrute($user_id, $mysqli) == true) {
				// account is locked -> send email to user
				return false;

			}	else {
				//check if password matches password in db
				if ($db_password == $password) {
					//correct password

					// get user-agent string (i.e. the name of the software acting on behalf of the user)
					$user_browser = $_SERVER['HTTP_USER_AGENT'];

					//protect against cross site scripting attact (XXS) as value might get print
					$user_id = preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = hash('sha512', $password . $user_browser);

					return true; // successful login

				} else {
					//incorrect password
					// record number of login attemps (to check for brute force attacks)
					$now = time();
					$mysqli ->query("INSERT INTO login_attempts(user_id, time)
									VALUES ('$user_id', '$now')");

					return false;

				}
			}
		} else {
			// no user exists
			return false;
		}
	}

}