<?PHP
include_once('function.php');
//parse if form submitted
if( $_POST['did_submit'] ):
// extract user submitted data
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
	$message = strip_tags(trim($_POST['message']), '<br><i><strong><em><p>' );
	$newsletter = $_POST['newsletter'];

	//validate!

	$valid = true;

	//name is required
	if (0==strlen($name)) {
		$valid = false;
		$errors['name'] ='Please fill out your name, son of Krypton.';
	}
	//check for invalid email format
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$valid = false;
		$errors['email'] = 'Please provide a valid email address, son of Krypton.';
	}

	//check message too long
	if (strlen($message) > 250 ) {
		$valid = false;
		$errors['message'] ='Please limit your message to 250 characters, son of Krypton.';
	}

	
	if(1 == $newsletter): //yoda logic that is
	  $newsletter = 'YES!';

	  else:
	  
	  $newsletter = 'NO!';

	endif;

	//only send the mail if the form was valid
	if (true == $valid):
	// prepare to send email, set up mail() parameters
	$to = 'ddownes@platt.edu';
	$subject = 'Contact Form from WP310 demo';

	$body = "Name: $name \n";
	$body .= "Email: $email \n";
	$body .= "Phone: $phone \n";
	$body .= "Add to Newsletter list: $newsletter \n\n";
	$body .= "Message: $message\n\n";

	$header = "Reply-to: $email \r\n";
	$header .= "From $name \r\n";

	//Send it! did_send will = 1 if the mail sends, 0 if it fails to send
	$did_send = mail( $to, $subject, $body, $header );

	// handle success/failure user feedback

if($did_send):
	$display_msg = 'Thank you for your message, '.$name.'. I will get back to you as soon as possible.';
	else:
	$display_msg = 'Sorry,' .$name. 'there was a problem with sending your message, while we figure out what happened, here is some porn.';	
	endif; //did_send
	endif; //did_valid_true

endif;	// did_submit
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Example Contact Form</title>
<link rel="stylesheet" type="text/css" href="reset.css">	
<link rel="stylesheet" type="text/css" href="style2.css">	
<style type="text/css">


</style>


</head>

<body>
	
	<header>
		<?php 
// hide if form did send successfully
if( !$did_send ): ?>
		<h1 id="talker">Contact ME!</h1>
		<?php endif; // hide if form did send ?> 
		<h1 id="talker2"><?php
	if(isset($display_msg) ):
		echo $display_msg;
	endif;
	?></h1>
	</header>
	

<div class="shadow" id="wrapper">
<?php 
// hide if form did send successfully
if( !$did_send ): ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label class ="formyforms" for="name" >Your Name:</label>
	<input class="chickennuggets" type="text" name="name" id="name" value ="<?php display_value ($name); ?>" />
	<?php 	display_error($errors, 'name'); ?>
	<label class ="formyforms" for="email" >Your Email Address:</label>
	<input class="chickennuggets" type="text" name="email" id="email" value ="<?php display_value ($email); ?>" />
	<?php 	display_error($errors, 'email'); ?>
	<label class ="formyforms" for="phone" >Your Phone Number:</label>
	<input class="chickennuggets" type="text" name="phone" id="phone" value ="<?php display_value ($phone); ?>" />

	<label class ="formyforms" for="message" >Your Message:</label>
	<textarea class="chickennuggets" name="message" id="message"><?php display_value ($message); ?></textarea>
	<?php 	display_error($errors, 'message'); ?>

	<input class="bbqchickennuggets" type="checkbox" name="newsletter" value = "1" id="newsletter"
	 <?php checked('YES!', $newsletter);  ?> />
	<label class ="formyforms" for="newsletter" id="newsletterText" >Yes, I am over the age of 18.</label>

	<input id="thisisabutton" type="submit" value="Send Message" />

	<input type="hidden" name="did_submit" value="1" />	

</form>

<?php endif; // hide if form did send ?> 
</div>
</body>

</html>