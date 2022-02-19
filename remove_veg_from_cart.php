<?php
session_start();

$userid = $_SESSION['userID'];
$veg_id = $_GET['veg_id'];

$conn = mysqli_connect("localhost","root","","freshshop");
if(!$conn)
    die("Connection Error: " . mysqli_connect_error());

$sql = "DELETE FROM cart WHERE customerID= '$userid' AND veg_id= '$veg_id'";

if (mysqli_query($conn, $sql))
{
 // unlink("img/profile_photos/" . $_GET['uid'] . ".jpg");
   header("Location:". $_SERVER['HTTP_REFERER']);
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>