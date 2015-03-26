<?php
include_once('resources/init.php');
session_start();
if (!isset($_SESSION['email']))
    header("Location: index.php");
if(isset($_POST['title'], $_POST['contents'], $_POST['category'],$_POST['image'])){
   $errors=array();
   $title = trim ($_POST['title']);
   $contents=trim($_POST['contents']);

   if( empty($title) ){
     $errors[]='You need to enter a title.';
   }
    else if(strlen($title)>255){
      $errors[]='The title cannot be longer than 255 characters.';
   }

   if(empty($contents)){
    $errors[]='You need to enter some text.';
   }
   if(!category_present('id',$_POST['category'])){
     $errors[]='That category does not exist.';
   }

   if(empty($errors)){
      add_post($title,$contents,$_POST['category'],$_POST['image']);
      $id=mysql_insert_id();
      header('Location: index.php');
      die();
   }
   
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<link rel="stylesheet" type="text/css" href="css/semantic.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<meta charset="utf-8">
  <style>label {display:block;}</style> 
<title>Add a Post</title>
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
	<h2>Add a Post</h2>

<?php
   if(isset($errors) && !empty($errors)){
      echo '<ul><li>', implode('</li><li>',$errors), '</li></ul>';

   }
?>

<form class="ui form segment" action="" method="POST">
      <div class="field">
        <label for="title"> Title </label>
   <input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>">
      </div>
      <div class="field">
        <label>Category</label>
         <select name="category" >
      <?php
      foreach(get_categories() as $category){
         ?>
         <option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </option>
         <?php
      }
      ?>
   </select>
      </div>
   
    <div class="field">
      <label for="contents"> Contents </label>
<textarea name="contents" ><?php if(isset($_POST['contents'])) echo $_POST['contents']; ?></textarea>
    </div>
    <div class="field">
      <label for="image">Image</label>
      <input type="text" name="image" value="<?php if(isset($_POST['img'])) echo $_POST['img']; ?>">
    </div>
    <input type="submit" value="Add Post">
  </form>

</main>
</body>
</html>