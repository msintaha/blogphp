<?php
include_once('resources/init.php');
session_start();
if (!isset($_SESSION['email']))
    header("Location: index.php");
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="css/semantic.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<title>Category List</title>
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
<div class="ui divided list">
<?php
foreach(get_categories() as $category){
?>
<div class="item">
   <a href="delete_category.php?id=<?php echo $category['id'];?>"> <div class="right floated compact ui red button">Delete</div></a>
	  <div class="content">
      <div class="header">
      	<a href="category.php?id=
<?php echo $category['id'];?>
">
<i class="fa fa-list"></i>&nbsp;<?php echo $category['name'];?>
</a>
      </div>
    </div>
  </div>
  <?php
}
?>
  </div>	

</main>
</body>
</html>