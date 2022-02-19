<?php 
session_start();

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$address = $_POST['Address'];
$country = $_POST['country'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$payment_method = $_POST['paymentMethod'];
$cardname = $_POST['cardname'];
$cardnum = $_POST['cardnumber'];
$date = $_POST['date'];
$cvv = $_POST['cvv'];


// echo $fname.$lname.$address.$country.$state.$zip;

require 'connect.php';

 $sql2 = "SELECT * FROM checkout_billing WHERE customerID=".$_SESSION['userID'];;
  $result = mysqli_query($conn,$sql2);
  if(!$result)
  {
      header("Location:Sign_up.php?error=SQLerror");
      exit();
  }
  else
  {
    
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck > 0)
      {
        $sql1 = "UPDATE checkout_billing SET fname='$fname' , lname='$lname' , addresses='$address' , country='$country' , 
                  states='$state' , zip='$zip' , payment_method = '$payment_method' , cardname ='$cardname' , cardnumber = '$cardnum' , 
                  exp_date='$date' , cvv = '$cvv' WHERE customerID=".$_SESSION['userID'];

          if(mysqli_query($conn, $sql1))
          {
            echo '<script>alert("Record Updated Sucessfully")</script>';
            header("Location:cart.php?qty=".$increment);
          }else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
          }
      }
      else if($resultCheck == 0)
      {
        $sql = "INSERT INTO checkout_billing (customerID,fname,lname,addresses,country,states,zip,payment_method,cardname,cardnumber,exp_date,cvv) 
            VALUES (".$_SESSION['userID'].",'$fname','$lname','$address','$country','$state','$zip',$payment_method,'$cardname','$cardnum','$date',$cvv)";
        if(mysqli_query($conn,$sql))
        {
         echo "<script>Record added!</script>";

         header("Location:". $_SERVER['HTTP_REFERER']);
        } 
        else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
      }

    }
mysqli_close($conn);
header("Location:checkout.php?total=".$_GET['total']); 
?>