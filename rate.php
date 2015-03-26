<?php
include_once('resources/init.php');

	$post=(int)$_GET['post'];
	$rating=(int) $_GET['rating'];
	if(in_array($rating,[1,2,3,4,5])){
		$query="INSERT INTO `ratings`(article,rating) VALUES ({$post},{$rating})";
		$que=mysql_query($query);
		header('Location:get_post.php?id='.$post);
	}
	header('Location:get_post.php?id='.$post);

?>