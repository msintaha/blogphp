<?php
session_start();
require_once 'lib/phpmailer/PHPMailerAutoload.php';
$errors=array();
if(isset($_POST['name'],$_POST ['email'],$_POST['message'])){
	$fields=[
'name'=>$_POST['name'],
'email'=> $_POST['email'],
'message' => $_POST['message']
	];
	foreach($fields as $field => $data){
		if(empty($data)){
$errors[]='The '.$field.' field is required';
		}
	}
	if(empty($errors)){
		$m=new PHPMailer;
		$m->isSMTP();
		$m->SMTPAuth=true;

		$m->Host='smtp.gmail.com';
		$m->Username = 'mifta@webable.com.bd';
		$m->Password = 'FAUXthephoenix2222';
		$m->SMTPSecure='ssl';
		$m->Port=465;
		$m->isHTML();
		 $m->Subject = 'Contact form submitted';
		 $m->Body='From: '.$fields['name']. ' ('.$fields['email'].') <p> '.$fields['message'].' </p>';
		 $m->FromName = 'Contact';
		 $m->AddAddress('mifta@webable.com.bd','Mifta Sintaha');

		 if($m->send()){
		 	echo 'Your message has been sent';
		 }
		 else{
		 	echo 'Not sent';
		 }
	}
}
else{
	$errors[]='Something went wrong, try again.';
}
$_SESSION['errors']=$errors;
$_SESSION['fields']=$fields;
header('Location: contact_us.php');

?>