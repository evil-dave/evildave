<?php
//open a new session or resume the existing session
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>

<body>

	<h1> Welcome! </h1>
<?php 
//if not logged in show form for logging in.
if (!$_SESSION['logged_in'] ){

?>
	 <a href="login_cookie_session.php"> Log In </a> 
<?php } 
else { ?>
	 <a href="login_cookie_session.php?action=logout">Log out </a> 
<?php } ?>

</body>

</html>