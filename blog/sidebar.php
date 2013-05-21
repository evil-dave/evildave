<aside>
		<?php
		//set up query to get the title & post_id of the latest 10 posts
		$query_latest = "SELECT title, post_id
						FROM posts
						WHERE is_public = 1
						ORDER BY date DESC
						LIMIT 10";
		//run query and check for results
		if( $result_latest = $db->query($query_latest) ):
		 ?>
		<h2>Latest Posts</h2>
		<ul>
			<?php 
			//from the list of results, go through each row, one at a time
			while( $row_latest = $result_latest->fetch_assoc() ): ?>
				<li>
	<a href="index.php?page=single&amp;post_id=<?php echo $row_latest['post_id']; ?>">
					<?php echo $row_latest['title']; ?></a></li>
			<?php endwhile; ?>
		</ul>
		<?php endif; ?>



		<h2>Categories</h2>
		<ul>
			<li><a href="#">TITLE</a></li>
			<li><a href="#">TITLE</a></li>
			<li><a href="#">TITLE</a></li>
		</ul>

		<h2>Links I Like:</h2>
		<ul>
			<li><a href="#">TITLE</a></li>
			<li><a href="#">TITLE</a></li>
			<li><a href="#">TITLE</a></li>
		</ul>
</aside>