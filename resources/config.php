<?php

$config['db_host']='localhost';
$config['db_user']='root';
$config['db_pass']='';
$config['db_name']='blog';
//key=value;

foreach($config $key => $value){

	define(strtoupper($key),$value);
}

?>