<?php
include_once('resources/init.php');
echo $_GET['id'];
if(!isset($_GET['id'])){
	header('Location: index.php');
	die();
}

delete_cat('categories',$_GET['id']);
header('Location: category_list.php');
die();
?>