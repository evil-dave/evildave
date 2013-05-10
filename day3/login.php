<?php
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
		
		$logged_in = 1;
	}else{
		$error = 1;
		
		}
	
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Log in to your account</title>
</head>

<body>

<?php 
//if not logged in show form for logging in.
if (!$logged_in){




?>
	
	<h1> Log In! </h1>

<?php 
// if an error was triggered show a message

if ($error){
	echo 'Username and password do not match. Try again!';
}

?>

	<form method ="post" action="login.php" >
		<label for="username">Username: </label>
		<input type ="text" name="username" id="username" >

		<label for="password">Password: </label>
		<input type ="text" name="password" id="password" >

		<input type="submit" value="Log In">
        		<input type="hidden" name="did_login" value="1">
	</form>
<?php
} //end if not logged in 
else{
	echo 'You are logged in';
}
?>
</body>

</html>