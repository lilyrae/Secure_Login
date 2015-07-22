
//hash passwords so they can't be accessed from web page
function formhash(form, password) {
	
	//create new html element to hold hashed password
	var p = document.createElement("input");

	//add the new element to login form page
	form.appendChild(p);

	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);

	//make sure plaintext password isn't sent
	password.value = "";

	//submit form
	form.submit();
}

//check registry form is complete
function checkform(form) {

	var e = form["email"].value;
	var p = form["password"].value;
	var cp = form["confirm_password"].value;
	var u = form["username"].value;

	if (e == "", p == "", cp == "", u == "") {
		alert("Please fill in required fields.");
		return false;
	}

	if (p != cp) {
		alert("Your passwords don't match.");
		return false;
	}

	var pp = document.createElement("input");
	//add the new element to login form page
	form.appendChild(pp);

	pp.name = "p";
	pp.type = "hidden";
	pp.value = hex_sha512(p);

	//make sure plaintext password isn't sent
	form["password"].value = "";
	form["confirm_password"].value = "";

	// submit form
	form.submit();
}