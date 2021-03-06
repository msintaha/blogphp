<?php
include('resources/init.php');
$posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null)); 
$contentLiked = false;

?>
<!DOCTYPE html>
<html>
	<head>
	<title>My Blog</title>
	 <link rel="stylesheet" type="text/css" href="style.css"> 
	<link rel="stylesheet" type="text/css" href="css/semantic.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	 <link rel="stylesheet" href="animate.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
<div class="ui red inverted menu">
  <a href="home.php" class="active item">
   <i class="fa fa-spoon"></i> Food Blog
  </a>
   <a href="contact_us.php" class="item">
    <i class="fa fa-envelope"></i> Contact Me
  </a>
   <a href="access.php" class="item">
     Login
  </a>
</div>

<div id="main">

	<div class="ui special cards">
			<?php
foreach($posts as $post){
	if(!category_present('name',$post['cat_name'])){
	 $post['cat_name']='Uncategorized';
	}
	?>
  <div class="card">

    <div class="dimmable image">
      <div class="ui inverted dimmer">
        <div class="content">
          <div class="center">
            <div class="ui primary button">View Recipe</div>
          </div>
        </div>
      </div>
      <img src="<?php echo $post['img']; ?>">
    </div>
    <div class="content">
      <a href="get_post.php?id=<?php echo $post['post_id']; ?>" class="header"><?php echo $post['title']; ?></a>
      <div class="meta">
        <span class="date"><i class="fa fa-clock-o"></i> &nbsp;Posted on <?php echo date('d-m-Y h:i:s',strtotime($post['date_posted']))?> </span><br><a class="ui ribbon green label"><?php  echo $post['cat_name'] ?></a>
        
      </div>
    </div>
   
    <?php
    $pid=$post['post_id'];
    $rate=get_rate($pid);
    foreach ($rate as $ratings) {
    ?> <div class="extra content">Rating out of <a class="ui pink circular label">5</a><br>
      <?php foreach(range(1,round($ratings['avrg'])) as $rating){ ?>
          <img id="star" src="img/star.png">
      <?php } ?> 
    </div>
 <?php
   }
 ?>
      <div class="ui bottom attached button">
<?php
    $pid=$post['post_id'];
    $count=comm_count($pid);
    foreach ($count as $commcount) {
    ?>
      <i class="fa fa-comment" style="color:white;"></i>&nbsp;
      <a href="get_post.php?id=<?php echo $post['post_id']; ?>" style="color:white;"> View Reviews&nbsp; 
      <div class="ui teal horizontal label"><?php echo $commcount['comm_no']; ?></div>
      </a>
  <?php } ?>
    </div>
  </div>
  	<?php
}
	?>
</div><br><br>
</div>
	
	<br><br>
	</body>
	<style type="text/css">
	.ui.button{
		background-color: #54c8ff !important;
	}
	.ui.teal.labels .label, .ui.teal.label {
  background-color: white !important;
  border-color: #00b5ad !important;
  color: #00b5ad !important;
} body{
  background-image:url("img/back.jpg") !important;
	}</style>
</html>