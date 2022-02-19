<?php

     if(isset($_POST['submit']))
     {
         require 'connect.php';

        //  $email = $_GET['mail'];
         $new_password = $_POST['password'];
         $new_password_confirm = $_POST['password-confirm'];
         $username = $_POST['username'];


        echo $new_password.'<br>';
        echo $new_password_confirm.'<br>';
        echo $username.'<br>';
        
        if(empty($new_password) || empty($new_password_confirm))
            header("Location:passwordreset.php?error=emptyFields");
        else if( $new_password != $new_password_confirm )
            header("Location:passwordreset.php?error=passwordsDoNotMatch");
        else
        {
            $sql = "UPDATE login SET Password='$new_password_confirm' WHERE Username='$username'";
            $result = mysqli_query($conn,$sql);
            if($result == TRUE)
            {
                //echo '<script>alert("Record Updated Successfully")</script>';
                header("Location:Sign_in.php?passwordreset=Success");
            }
            else
            header("Location:passwordreset.php?error=sqlerror");
        }    
         
     }
  

?>