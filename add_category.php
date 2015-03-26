<?php
include_once('resources/init.php');
session_start();
if (!isset($_SESSION['email']))
    header("Location: index.php");
if(isset($_POST['name'])){
	$name=trim($_POST['name']);

}if(empty($name)){
	$error='You must submit a category name.';
} else if(category_exists($name)){
	$error='That category already exists.';
} else if(strlen($name)>24){
	$error= 'Category names can only be upto 24 characters.';
}
if(!isset($error)){
	add_category($name);
	header('Location: add_post.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<title>Add a Category</title>
   <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="ui red inverted menu">
  <a href="home.php" class="active item">
   <i class="fa fa-spoon"></i> Food Blog
  </a>
  <a href="add_post.php" class="item">
   <i class="fa fa-plus"></i> Post
  </a>
  <a href="add_category.php" class="item">
    <i class="fa fa-bookmark-o"></i> Food Category
  </a>
   <a href="category_list.php" class="item">
    <i class="fa fa-list"></i> Food Categories
  </a>
   <a href="logout.php" class="item">
     Logout
  </a>
</div>

	
 <main style="width:80% !important;margin-left:auto;margin-right:auto;padding:10px;background:white;">
   <h2>Add a Category</h2>

<?php
if(isset($error)){
	echo "<h5> {$error} </h5>\n";
}
?>
<form class="ui form segment" action="" method="post">
    
      <div class="field">
        <label for="name"> Name </label>
     <input type="text" name="name" value="">
      </div>
    <input type="submit" value="Add Category">
  </form>
   </main>
   
</body>
</html>