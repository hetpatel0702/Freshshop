<?php

if(isset($_POST['signup']))
{
   // require 'connect.php';
   $conn = new mysqli('localhost','root','','freshshop');
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }

   echo "Connected successfully";


   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_repeat = $_POST['password-repeat'];

   if(empty($username) || empty($email) || empty($password)){
     header("Location:Sign_up.php?error=emptyfields&username=".$username."&mail=".$email);
     exit();
   }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)){
     header("Location:Sign_up.php?error=invalidEmailandUsername");
     exit();
   }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     header("Location:Sign_up.php?error=invalidEmail&username=".$username);
     exit();
   }
   else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
     header("Location:Sign_up.php?error=invalidUsername&mail=".$email);
     exit();
   }
   else if($password !== $password_repeat){
     header("Location:Sign_up.php?error=passwordsNotMatch&username=".$username."&mail=".$email);
     exit();
   }
   else
   {
        $sql = "SELECT usernameAdmin FROM admin WHERE usernameAdmin=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:Sign_up.php?error=SQLerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
                header("Location:Sign_up.php?error=UsernameTaken&mail=".$email);
                exit();
            }
            else
            {

                $sql = "INSERT INTO admin (usernameAdmin,emailAdmin,passwordAdmin) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location:Sign_up.php?error=SQLerror");
                    exit();
                }
                else
                {
                    $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashed_pass);
                    mysqli_stmt_execute($stmt);
                    header("Location:index.php?Signup=success");
                    exit();
                }
            }
        }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else {
  header("Location:Sign_up.php");
  exit();
}
?>
