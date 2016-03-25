<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>User Login</title>
	<link rel="stylesheet" href="../assets/css/belttest.css">
</head>
<body>
	<div id="wrapper">
		<h1>Welcome!</h1>
		<div class="div_form">
<?php		if($this->session->flashdata("registration_errors"))
			{
				echo $this->session->flashdata("registration_errors");
			}
?>
			<form id="register" action="/login/process_registration" method="post">
				<fieldset>
				<legend>Register</legend>
				<label for="first_name">Name: </label> 
				<input type="first_name" name="first_name"/> <br/>
				<label for="last_name">Alias: </label>
				<input type="last_name" name="last_name"/> <br/>
				<label for="email">Email: </label>
				<input type="text" name="email"/> <br/>
				<label for="password">Password</label>
				<input type="password" name="password"/> <br/>
				<label for="confirm_password">Confirm PW</label>
				<input type="password" name="confirm_password"/> <br/>
				<label for="date of birth">Date of Birth</label>
				<input type="date" name="date of birth"/> <br/>
				<input type="submit" value="Register" />
				</fieldset>
			</form>
		</div>


		<div class="div_form">
<?php		if($this->session->flashdata("login_errors"))
			{
				echo $this->session->flashdata("login_errors");
			}
?>
			<form id="login" action="/login/process_login" method="post">
				<fieldset>
				<legend>Login</legend>
				<label for="email">Email: </label>
				<input type="text" name="email"/> <br/>
				<label for="password">Password</label>
				<input type="password" name="password"/> <br/>
				<input type="submit" value="Login" />
				</fieldset>
			</form>
		</div>
	
	</div>
</body>
</html>