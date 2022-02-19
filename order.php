<?php
session_start();
                require 'connect.php';

                
                $sql2 = "SELECT * FROM cart WHERE customerID=".$_SESSION['userID'];
                $result2 = mysqli_query($conn,$sql2);
                $b = 0;
                $c = 0; 
                $a = 0;
                if($result2)
                {
                    while($row = mysqli_fetch_assoc($result2))
                    {
                        
                        $sql3 = "SELECT * FROM vegetable WHERE veg_id=".$row['veg_id'];
                        if(mysqli_query($conn,$sql3))
                        {
                            $row2 = mysqli_fetch_assoc(mysqli_query($conn,$sql3));
                            $diff = $row2['veg_qty'] - $row['cart_veg_qty'];
                            $sql1 = "UPDATE vegetable SET veg_qty = $diff WHERE veg_id=".$row['veg_id'];
                            if(!mysqli_query($conn,$sql1))
                            {
                                $a = 1;
                            }
                        }
                        else
                        {
                            $b = 1;
                        }
                        
                    }
                }
                else{
                    $c = 1;
                }
                $sql = "DELETE FROM cart WHERE customerID=".$_SESSION['userID'];
                $result = mysqli_query($conn,$sql);

                if(!$a && !$b && !$c && $result)
                {
                    header("Location:index.php?Purchase=Successful!");
                }
                else
                {
                    header("Location:index.php?Purchase=Failed!");
                }

            
        mysqli_close($conn);

?>