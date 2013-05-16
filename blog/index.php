<?php require('db_connect.php');  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Evil Dave's PHP Blog</title>
</head>

<body>
	<header>
		<h1>A blog about caring</h1>
	</header>

	<main>
		<?php 
		// set up a query to retrieve the two most recent posts that are published
		$query = ' SELECT title, body, date, category_id, post_id 
				FROM posts 
				WHERE is_public = 1
				ORDER BY date DESC 
				LIMIT 2';
		// run it and check to make sure the result contains posts
		if ( $result = $db-> query($query) ):	
		?>

		<h2>Most Recent Post</h2>

		<?php 
		//loop through the list of results
		//today we are using a "while" loop
		while ( $row = $result->fetch_assoc()):
		?>
		
		<article class ="post">
			<h3><?php echo $row['title']; ?></h3>
			<div class="postmeta">Posted on <?php echo $row['date']; ?> | in the category NAME </div>
			<p><?php echo $row['body']; ?></p>
		</article>

		<?php 
		endwhile;
		?>
		
		<?php else: ?>

		<h2> The Force is strong with this one </h2>

		<?php endif;?>

	</main>

	<aside>
		<?php include ('sidebar.php'); ?>
	</aside>

	<footer>
		<p>&copy; 2013 Blatt College</p>
	</footer>
</body>

</html>