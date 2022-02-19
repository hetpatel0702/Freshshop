<?php

if(isset($_POST['log-in']))
{
  require 'connect.php';

  $mail = $_POST['email-login'];
  $password = $_POST['password-login'];

  if(empty($mail) || empty($password)){
    header("Location:Sign_in.php?error=emptyfields");
    exit();
  }
  else
  {
    $sql = "SELECT * FROM login WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
      header("Location:Sign_in.php?error=sqlerror");
      exit();
    }
    else {

        mysqli_stmt_bind_param($stmt,"ss",$mail,$mail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($rows = mysqli_fetch_assoc($result))
        {
            $passCheck = password_verify($password,$rows['Password']);
            if($password != $rows['Password'])
            {
              header("Location:Sign_in.php?error=wrongpass");
              exit();
            }
            else if($password == $rows['Password'])
            {
              session_start();
              $_SESSION['userName'] = $rows['Username'];
              $_SESSION['userID'] = $rows['customerID'];

              header("Location:index.php?login=success&username=".$rows['Username']);
              exit();
            }

        }
        else {
          header("Location:Sign_in.php?error=nouser");
          exit();
        }
    }
  }



}
else
{
  header("Location:Sign_in.php");
  exit();
}



//
// if (empty($_POST["subject"])) {
//     $errorMSG .= "Subject is required ";
// } else {
//     $subject = $_POST["guest"];
// }
//
// // MESSAGE
// if (empty($_POST["message"])) {
//     $errorMSG .= "Message is required ";
// } else {
//     $message = $_POST["message"];
// }
//
//
// $EmailTo = "armanmia7@gmail.com";
// $Subject = "New Message Received";
//
// // prepare email body text
// $Body = "";
// $Body .= "Name: ";
// $Body .= $name;
// $Body .= "\n";
// $Body .= "Email: ";
// $Body .= $email;
// $Body .= "\n";
// $Body .= "guest: ";
// $Body .= $guest;
// $Body .= "\n";
// $Body .= "event: ";
// $Body .= $event;
// $Body .= "\n";
// $Body .= "Message: ";
// $Body .= $message;
// $Body .= "\n";
//
// // send email
// $success = mail($EmailTo, $Subject, $Body, "From:".$email);
//
// // redirect to success page
// if ($success && $errorMSG == ""){
//    echo "success";
// }else{
//     if($errorMSG == ""){
//         echo "Something went wrong :(";
//     } else {
//         echo $errorMSG;
//     }
// }

?>
