<?php
include('resources/init.php');
 session_start();
$pid=$_GET['id'];
$posts = get_posts($pid); 
?>
<!DOCTYPE html>
<html>
  <head>
  <title>My Blog</title>


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
   <a href="contact_us.php" class="item">
    <i class="fa fa-envelope"></i> Contact Me
  </a>
</div>


  <main style="width:80% !important;margin-left:auto;margin-right:auto;padding:10px;background:white;">
  
    <?php
foreach($posts as $post){
    if(!category_present('name',$post['cat_name'])){
   $post['cat_name']='Uncategorized';
  }
  ?>
  <div class="ui orange segment"><br>
  <h2 class="ui purple header"><?php echo $post['title']; ?></h2>
  <p id="timestamp"><i class="fa fa-clock-o"></i> &nbsp;Posted on <?php echo date('d-m-Y h:i:s',strtotime($post['date_posted']))?> 
  in <a class="ui green tag label" ><?php  echo $post['cat_name'] ?></a>
  </p>
      <div class="article-rate">
        <a class="ui blue circular label">
Rate this recipe NOW!
</a><br><br>
        <?php foreach(range(1,5) as $rating){ ?>
          <a href="rate.php?post=<?php echo $pid; ?>&rating=<?php echo $rating; ?>"><img id="star" src="img/star.png"></a>
      <?php } ?>
      </div>
    <br><br><img class="ui centered image" src="<?php echo $post['img']; ?>"><br> 
    <p class="post-content"><?php echo nl2br($post['contents']);?></p> <!--nl2br helps to keep the text format--> 
  </div>
  <div class="ui secondary pointing menu">
    <?php
    $pid=$post['post_id'];
    $count=comm_count($pid);
    foreach ($count as $commcount) {
    ?>
  <a class="active item">
    <i class="fa fa-comment"></i>&nbsp; <strong><?php echo $commcount['comm_no']; ?>&nbsp; COMMENTS</strong>
  </a>
  <?php } ?>
</div>


<?php
  $pid= $post['post_id'];
  $comm=get_comments($pid);

?>

<div class="ui comments">
 <?php foreach ($comm as $comment) {
    ?>
  <div class="comment">
 <?php

if (isset($_SESSION['email'])) {?>
    <a href="delete_comment.php?id=<?php echo $comment['comm_id']; ?>"><div class="right floated compact ui red button">Delete</div></a>
<?php }else{ ?>
    <a href="#"></a>
 <?php }?>
    <a class="avatar">
      <img src="img/avatar.png">
    </a>
    <div class="content">
      <a class="author"><?php echo $comment['user'];?></a>
      <div class="metadata">
        <span class="date">at <?php echo date('d-m-Y h:i:s',strtotime($comment['date']))?></span>
      </div>
      <div class="text">
        <?php echo nl2br($comment['body']); ?>
      </div>
    </div>
  </div>
  <?php
  }?>
  </div>

 <?php
   //echo 'something';
   $pid= $post['post_id'];
  if(isset($_POST['please']) && isset($_POST['work'])){
    if(!empty($_POST['please']) && !empty($_POST['work'])){
   $user = $_POST['please'];
   $comment=$_POST['work'];
     add_comment($pid,$user,$comment);
     header("refresh: 1;");
  }
}
?>

<form class="ui form segment" method="POST">
    <div class="two fields">
      <div class="field">
        <label>Name</label>
        <input placeholder="Name" name="please" type="text" required>
      </div>
    </div>
    <div class="field"><br>
      <label>Comment</label>
      <textarea name="work" placeholder="Write your comment.." required></textarea>
    </div>
   <input type="submit" value="Add Comment">
  </form>
  <?php
}
  ?>  
  </main><br><br>
  </body>
</html>
