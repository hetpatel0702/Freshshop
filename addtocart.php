<?php
session_start();

$uid = $_SESSION['userID'];
$vid = $_GET['vid'];
$qty = 1;

$conn = mysqli_connect('localhost','root','','freshshop');
if (!$conn)
  die("Connection failed: " . mysqli_connect_error());

  $sql = "SELECT * FROM cart WHERE customerID=$uid AND veg_id=$vid";
  $result = mysqli_query($conn,$sql);
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
         $rows = mysqli_fetch_assoc($result);
         //echo $rows['cart_veg_qty']$rows['customerID']$rows['veg_id'];
         $increment = $rows['cart_veg_qty']+1;
        //$sql1 = "UPDATE cart SET cart_veg_qty=".$increment." WHERE customerID= $uid AND veg_id= $vid";
        $sql1 = "UPDATE cart SET cart_veg_qty=$increment WHERE customerID= $uid AND veg_id= $vid";
          if(mysqli_query($conn, $sql1))
          {
            echo '<script>alert("Record Added Sucessfully")</script>';
            header("Location:cart.php");
          }else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
          }
      }
      else if($resultCheck == 0)
      {
        $sql2 = "INSERT INTO cart (customerID, veg_id,cart_veg_qty)
        VALUES ('$uid', '$vid', '$qty')";
        
        if(mysqli_query($conn, $sql2)) {
          echo '<script>alert("Record Added Sucessfully")</script>';
          header("Location:cart.php");
        } else {
          echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
      }

    }
mysqli_close($conn);
?>
