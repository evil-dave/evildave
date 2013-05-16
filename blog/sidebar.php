<sidebar>
<?php 
	// set up query to get titles and post_id up to 10 posts
	$query_latest = " SELECT title, post_id
				FROM posts
				WHERE is_public = 1
				ORDER BY date DESC
				LIMIT 10";

	// run query and check for results
	if ( $result_latest = $db->query($query_latest) ):			
?>
	
	
	<h2> Latest Posts </h2>

	<ul>
		<?php while ($row_latest = $result_latest -> fetch_assoc() ): ?>
		<li><a href="#"><?php echo $row_latest['title']; ?></a></li>
		<?php endwhile; ?>
	</ul>
<?php endif; // end of the category query?>

<?php 
	// set up query to get titles and post_id up to 10 posts
	$query_categories = " SELECT *
				FROM category
				LIMIT 10";

	// run query and check for results
	if ( $result_categories = $db->query($query_categories) ):			
?>
	<h2>Categories</h2>

	<ul>
		<?php while ($row_categories = $result_categories -> fetch_assoc() ): ?>
		<li><a href="#"><?php echo $row_categories['name']; ?></a></li>
		<?php endwhile; ?>
	</ul>

<?php endif; // end of the category query?>

<?php 
	// set up query to get titles and post_id up to 10 posts
	$query_links = " SELECT url, link_id, link_image
				FROM links
				LIMIT 10";

	// run query and check for results
	if ( $result_links = $db->query($query_links) ):			
?>
	<h2>Images with dots next to them that if you click on them, they go places</h2>
	<ul>
		<?php while ($row_links = $result_links -> fetch_assoc() ): ?>
		<li><a href="http://<?php echo $row_links ['url']?>"><img src="images/<?php echo $row_links['link_image']; ?>" width="100" height="140" /></a></li>
		<?php endwhile; ?>
	</ul>

<?php endif; // end of the category query?>
</sidebar>	
