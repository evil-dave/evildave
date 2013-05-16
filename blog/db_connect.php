<?php
// db host, username, password, database name
$db = new mysqli('localhost', 'blattcollege', 'phprules', 'blog_evil' );

//if there is an error connecting, kill the page

if( $db ->connect_errno > 0 ) {
	die ( 'Unable to connect to the database' );
}