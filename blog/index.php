<?php require('db_connect.php'); 
include_once ('function.php');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Melissa's PHP Blog</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
		<h1>Melissa's Blog</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=blog">Blog</a></li>
				<li><a href="index.php?page=links">Links</a></li>
			</ul>
		</nav>
	</header>

	<main>
	<?php 
		//logic to load the correct page contents. 
		//URI will look like domain/index.php?page=something
		switch( $_GET['page'] ){
			case 'blog':
				include( 'content-blog.php' );
			break;
			case 'single':
				include ('content-single.php');
			break;
			default:
				include('content-home.php');
		}
		 ?>
	</main>

	<?php include('sidebar.php'); ?>

	<footer>
		<p>&copy; 2013 Platt College</p>
	</footer>
</body>
</html>