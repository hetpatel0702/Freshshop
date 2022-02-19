<?php

$user = 'root';
$pass = '';
$db = 'freshshop';

$conn = new mysqli('localhost',$user,$pass,$db);



if(!$conn)
{
  die("Connection failed:". mysqli_connect_error());
}
?>
