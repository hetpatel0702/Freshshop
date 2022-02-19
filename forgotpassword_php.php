<?php

                     if(isset($_POST['reset']))
                    {
                        require 'connect.php';

                         $username = $_POST['username'];
                         $date = $_POST['bdate'];
                         $question = $_POST['question'];
        
                         $sql = "SELECT * FROM login WHERE Username = '$username' AND Fav_food = '$question'";
                        //$sql = "SELECT * FROM login WHERE Email =".$email." AND Fav_food =".$question;
                        $result = mysqli_query($conn,$sql);
                        if (!(mysqli_num_rows($result) > 0))
                        {
                            header("Location:forgotpassword.php?error=nouser");
                        }
                        else
                        {
                            header("Location:passwordreset.php?found=success&username=".$username);
                            // $rows = mysqli_fetch_assoc($result);
                            // echo $rows["Password"];
        
                         }

                    }
    
                 
?>