<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Post Method Example</title>
</head>

<body>
	<form method="post" action="post.php">
		<label for="name">What is Your Name?</label>
		<input type="text" name="name" id="name" />

		<label for="breakfast">What did You Eat for Breakfast?</label>
		<input type="text" name="breakfast" id="breakfast" />

		<input type="submit" value="Go!" />
		<input type="hidden" name="did_submit" value="1" />
	</form>

	<?php
	//only show the message if the form was submitted
	if( $_REQUEST['did_submit'] == 1 ){ 
		/*
		echo 'Good Morning, ';
		echo $_REQUEST['name'];
		echo '. ';
		echo $_REQUEST['breakfast'];
		echo ' Sounds delicious.';
		*/

		echo 'Good Morning, ' . $_REQUEST['name'] . '. '.$_REQUEST['breakfast'].' Sounds delicious.';
	}
	 ?>
</body>
</html>