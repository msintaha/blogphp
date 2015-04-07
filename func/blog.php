<?php

function add_post($title, $contents, $category,$img){
$title = mysql_real_escape_string($title);
$contents=mysql_real_escape_string($contents);
$category=(int) $category;

mysql_query("INSERT INTO `posts` SET `cat_id`={$category},
    `title`='$title',
    `contents` = '$contents',
    `date_posted`=NOW(),
     `img`='{$img}'
	");

}
function edit_post($id, $title, $contents, $category,$img) {
	$id 		= (int) $id;
	$title 		= mysql_real_escape_string($title);
	$contents 	= mysql_real_escape_string($contents);
	$img        = mysql_real_escape_string($img);
	$category 	= (int) $category;

	mysql_query("UPDATE `posts` SET
		`cat_id`	= {$category},
		`title`		= '{$title}',
		`contents`	= '{$contents}',
		`img`		= '{$img}',
		`date_posted`=NOW()
		WHERE `id` = {$id} ");

}


function add_category($name){
$name=mysql_real_escape_string($name);
mysql_query("INSERT INTO `categories` SET `name` = '{$name}'");

}
function delete_cat($table, $id){
$table=mysql_real_escape_string($table);
$id=(int) $id;
$query="DELETE FROM `{$table}` WHERE `id`='{$id}'";
mysql_query($query);

}
function delete($table, $id){
$table=mysql_real_escape_string($table);
$id=(int) $id;
$query="DELETE FROM `{$table}` WHERE `id`='{$id}'";
mysql_query($query);
$del="DELETE FROM `comments` WHERE `post_id`='{$id}'";
mysql_query($del);
$rate="DELETE FROM `ratings` WHERE `article`='{$id}'";
mysql_query($rate);
}
function delete_comm($id){
$id=(int) $id;
$query="DELETE FROM `comments` WHERE `comment_id`='{$id}'";
mysql_query($query);

}
function comm_count($pid){
	$pid=(int) $pid;
 $sql= "SELECT
  count(`comment_id`) AS `comm_no`
  	FROM `comments` WHERE `post_id`={$pid}";
  	$comments=mysql_query($sql);
	$return=array();
  	while(($row=mysql_fetch_assoc($comments)) !==false){
  		$return[]=$row;
  	}
  	return $return;
}
function get_rate($pid){
	$pid=(int) $pid;
	$sql="SELECT avg(`rating`) AS `avrg` FROM `ratings`
	WHERE `article`={$pid}";
		$query = mysql_query($sql);

	$return=array();
  	while(($row=mysql_fetch_assoc($query)) !==false){
  		$return[]=$row;
  	}
  	return $return;

}
function get_comments($pid){
 $pid=(int) $pid;
 $sql= "SELECT
  `comment_body` AS `body`,
  `comment_user` AS `user`,
  `comment_date` AS `date`,
  `comment_id` AS `comm_id`
  	FROM `comments` WHERE `post_id`={$pid}";
  	$comments=mysql_query($sql);
  	$return=array();
  	while(($row=mysql_fetch_assoc($comments)) !==false){
  		$return[]=$row;
  	}
  	return $return;
}
function add_comment($pid,$user,$body){
 $pid=(int)$pid;
 $user=mysql_real_escape_string($user);
 $body=mysql_real_escape_string($body);
 $que="INSERT INTO `comments` SET `post_id`={$pid},
    `comment_user`='{$user}',
    `comment_body` = '{$body}',
    `comment_date`=NOW()
	";
 mysql_query($que);
}
function get_posts($id = null,$cat_id=null){
	$posts = array();
	$query = "SELECT posts.id AS post_id, categories.id AS category_id, title, contents,img, date_posted, categories.name AS cat_name FROM posts INNER JOIN categories ON categories.id = posts.cat_id ";
	
	if ( isset($id) ) {
		$id = (int) $id;
		$query .= " WHERE `posts` . `id` = {$id}";
	}

	if (isset($cat_id) ){
		$cat_id = (int) $cat_id;
		$query .= " WHERE `cat_id` = {$cat_id}";
	}

	$query .= " ORDER BY `posts` . `id` DESC";

	$query = mysql_query($query);

	while ($row = mysql_fetch_assoc($query) ) {
		$posts[] = $row;
	}
	return $posts;
}

function get_categories($id=null){
$categories=array();
$query=mysql_query("SELECT `id`,`name` FROM `categories`");

while($row=mysql_fetch_assoc($query)){
	$categories[]=$row;
}
return $categories;

}
function category_exists($name){
$name=mysql_real_escape_string($name);
$query=mysql_query("SELECT COUNT(1) FROM `categories` WHERE `name` = '{$name}'");
return (mysql_result($query,0)== '0') ? false:true;
//if 0 rows were returned with that category name,then
//that category doesnt exist so false. otherwise it exists so true
}
function category_present($field,$value){
$field=mysql_real_escape_string($field);
$value=mysql_real_escape_string($value);
$query=mysql_query("SELECT COUNT(1) FROM `categories` WHERE `{$field}` = '{$value}'");
return (mysql_result($query,0)== '0') ? false:true;
}

?>