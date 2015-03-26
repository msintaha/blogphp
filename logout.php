<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/semantic.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<main style="width:25%;margin-left:auto;margin-right:auto;">
<?php
session_start();
session_destroy();
echo '<h2>You have been logged out. <br><a href="index.php">Click</a> here to return to home</h2>';
?>
</main>
</body>
</html>