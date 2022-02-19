<?php 
session_start();

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$address = $_POST['Address'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];



// echo $fname.$lname.$address.$country.$state.$zip;

require 'connect.php';

$sql = "INSERT INTO checkout_billing (customerID,fname,lname,addresses,country,states,zip) 
            VALUES (".$_SESSION['userID'].",'$fname','$lname','$address','$country','$state','$zip')";
if(mysqli_query($conn,$sql))
{
    echo "<script>Record added!</script>";

    header("Location:". $_SERVER['HTTP_REFERER']);
} 
else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);



?>