<?php
include_once('resources/init.php');

$posts = get_posts(null, $_GET['id']);
session_start();
if (!isset($_SESSION['email']))
    header("Location: index.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<title>My Blog</title>
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
<main style="width:80%;margin-left:auto;margin-right:auto;padding:10px;background:white;">
	<?php
foreach($posts as $post){
	if(!category_present('name',$post['name'])){
	 $post['name']='Uncategorized';
	}
	?>
	<div class="ui orange segment"><br>
  <a href="index.php?id=<?php echo $post['post_id']; ?>"><h2 class="ui purple header"><?php echo $post['title']; ?></h2></a>
	<p id="timestamp"><i class="fa fa-clock-o"></i> &nbsp;Posted on <?php echo date('d-m-Y h:i:s',strtotime($post['date_posted']))?> 
in <a class="ui green tag label" ><?php  echo $post['name'] ?></a>
	</p>
<a href="edit_post.php?id=<?php echo $post['post_id']; ?>" class="ui blue label"><i class="fa fa-pencil-square-o"></i> Edit</a>	
<a href="delete_post.php?id=<?php echo $post["post_id"]; ?>" class="ui red label"><i class="fa fa-times"></i> Delete</a>			
		<br><br><img class="ui centered image" src="<?php echo $post['img']; ?>"><br>	
		<p class="post-content"><?php echo nl2br($post['contents']);?></p> <!--nl2br helps to keep the text format-->	
	</div>
	<?php
}
	?>
	</main>
	</body>
</html>