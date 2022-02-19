<?php
$conn = mysqli_connect("localhost","root","","freshshop");
if(!$conn)
    die("Connection Error: " . mysqli_connect_error());

$sql = "DELETE FROM ".$_GET['dbname']." WHERE ".$_GET['id']." = " . $_GET['uid'];

if (mysqli_query($conn, $sql))
{
 // unlink("img/profile_photos/" . $_GET['uid'] . ".jpg");
   header("Location:". $_SERVER['HTTP_REFERER']);
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>
