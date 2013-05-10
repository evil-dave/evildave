<?php
//open a new session or resume the existing session
session_start();
// the correct username/password combo
$correct_username='evildave';
$correct_password='password';
// if the form was submitted, try to log them in 
if( $_POST['did_login']){
	//extract the values the user typed in
	$username = $_POST['username'];
	$password = $_POST['password'];
	//compare user values with correct values. They match, they can log in.
	if($username == $correct_username && $password == $correct_password){
		// use cookies and sessions to remember the user
		$_SESSION['logged_in'] = 1;
		setcookie('logged_in',  1, time() + (60 * 10));
	}else{
		$error = 1;
		}
}
// if the user is trying to log out unset and destroy the session and cookies
if ($_GET['action'] =='logout'){
	unset($_SESSION['logged_in']);
	session_destroy();
	setcookie('logged_in', ' ' , time() - 60 * 60 * 24 * 365 );
}

//if the user visits the page and the cookie is still valid re-create session variable
elseif ( $_COOKIE['logged_in'] ==1) {
$_SESSION['logged_in'] = 1;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="reset.css">	
<link rel="stylesheet" type="text/css" href="style.css">	
<title>Log in to your account</title>
</head>

<body>

<?php 
//if not logged in show form for logging in.
if (!$_SESSION['logged_in'] ){

?>
	
	<h1 id="login"> Log In! </h1>

<?php 
// if an error was triggered show a message

if ($error){
	echo 'Username and password do not match. Try again!';
}

?>

	<form id= "superform" class ="shadow" method ="post" action="login_cookie_session.php" >
		<label class="formyforms" for="username">Username: </label>
		<input  class ="chickennuggets" type ="text" name="username" id="username" >

		<label class="formyforms" for="password">Password: </label>
		<input class="chickennuggets" type ="text" name="password" id="password" >

		<input id="thisisabutton" type="submit" value="Log In">
        		<input type="hidden" name="did_login" value="1">
	</form>
<?php
} //end if not logged in 

// if logged in - 
else{
	?>
<p> You are logged IN! </p>
<p><a href="home.php">Home</a></p>
<p><a href="login_cookie_session.php?action=logout">Log out </a></p>

	<?php } ?>
</body>

</html>