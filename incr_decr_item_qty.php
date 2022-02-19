<?php
session_start();


if($_GET['hit'] == "minus")
{
    $uid = $_SESSION['userID'];
    $vid = $_GET['veg_id'];
    $conn = mysqli_connect('localhost','root','','freshshop');
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    $sql = "SELECT * FROM cart WHERE customerID=$uid AND veg_id=$vid";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_assoc($result);

    $increment = $rows['cart_veg_qty']-1;

    $sql1 = "UPDATE cart SET cart_veg_qty=$increment WHERE customerID= $uid AND veg_id= $vid";
          if(mysqli_query($conn, $sql1))
          {
            echo '<script>alert("Record Added Sucessfully")</script>';
            if($increment == 0)
                header("Location:remove_veg_from_cart.php?veg_id=".$rows['veg_id']);
            else
            header("Location:cart.php?qty=".$increment);
          }else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
          }
}
else if($_GET['hit'] == 'plus')
{
    $uid = $_SESSION['userID'];
    $vid = $_GET['veg_id'];
    $conn = mysqli_connect('localhost','root','','freshshop');
    if (!$conn)
        die("Connection failed: " . mysqli_connect_error());

    $sql2 = "SELECT * FROM vegetable WHERE veg_id = $vid";
    if(mysqli_query($conn,$sql2))
    {
        $row2 = mysqli_fetch_assoc(mysqli_query($conn,$sql2));
        $sql = "SELECT * FROM cart WHERE customerID=$uid AND veg_id=$vid";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_assoc($result);
        $increment = $rows['cart_veg_qty'];
        $a = 0;
        if($row2['veg_qty'] >= 5)
        {
          if($rows['cart_veg_qty'] < 5)
              $increment = $rows['cart_veg_qty']+1;
        }
        else
        {
            $Max_limit = $row2['veg_qty'];
            $a = $Max_limit;
            if($rows['cart_veg_qty'] < $Max_limit)
                $increment = $rows['cart_veg_qty']+1;
        }
          $sql1 = "UPDATE cart SET cart_veg_qty=$increment WHERE customerID= $uid AND veg_id= $vid";
          if(mysqli_query($conn, $sql1))
          {
              echo '<script>alert("Record Added Sucessfully")</script>';
              if($increment == 5) 
                  header("Location:cart.php?error=MaxQuantityPerUser");
              else if($increment < 5 && $a)
              header("Location:cart.php?warning=Only ".$a." itemsLeft");
              else 
                  header("Location:cart.php");        
          }
              else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
              }
            
    }
        
    
    
    


    
}

?>
