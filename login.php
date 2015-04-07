<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/semantic.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<main>
<?php
include_once('resources/init.php');
session_start();
$email= $_POST['email'];
$password=$_POST['password'];
if($email && $password){
	$query=mysql_query("SELECT * FROM author WHERE email='$email'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0){
		while($row=mysql_fetch_assoc($query)){
			$dbemail=$row['email'];
			$dbpass=$row['password'];
		}
		if($email==$dbemail && $password==$dbpass){
			
			$_SESSION['email']=$dbemail;
			header('Location:home.php');

		} else{
			echo "<h2>Login Unauthorized</h2>";
		}
	} else{
		die("User doesn't exist");
	}
}

?>
</main>
</body>
<html>