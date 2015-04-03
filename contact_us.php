<?php
include_once('resources/init.php');
session_start();

require_once 'security.php';
$errors=isset($_SESSION['errors']) ? $_SESSION['errors']: [];
$fields=isset($_SESSION['fields']) ? $_SESSION['fields']: [];
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/semantic.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
   <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<title>Contact Us</title>
</head>

<body>
<div class="ui red inverted menu">
  <a href="index.php" class="item">
   <i class="fa fa-spoon"></i> Food Blog
  </a>
   <a href="contact_us.php" class="active item">
    <i class="fa fa-envelope"></i> Contact Me
  </a>
</div>

<main >
	<div class="contact">

<?php if(!empty($errors)): ?>
<div >
	<ul>
		<li><?php echo implode('<li></li>',$errors) ?></li>

	</ul>
</div>
<?php endif; ?>

<form class="ui form segment" action="contact.php" method="post">
      <div class="field">
        <label for="title"> Your Name* </label>
   <input type="text" name="name" autocomplete="off" <?php echo isset($fields['name'])? ' value=" '. e($fields['name']) . '" ' : ''  ?>>
      </div>
      <div class="field">
        <label>Your Email*</label>
        <input type="text" name="email" autocomplete="off" <?php echo isset($fields['email'])? ' value=" '. e($fields['email']) . '" ' : ''  ?> >
      </div>
   
    <div class="field">
      <label for="contents">  Your Message* </label>
  <textarea  name="message" rows="8" <?php echo isset($fields['message'])? ' value=" '. e($fields['message']) . '" ' : ''  ?> > </textarea>
    </div>
  
    <input type="submit" value="Send">
    <h5 class="muted" >* means a required field</h5>
  </form>
	</div>
</main>

</body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>