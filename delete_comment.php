<?php 

	include_once('resources/init.php'); 
$cid=$_GET['id'];
delete_comm($cid);

header('Location: home.php');
die();

?>

