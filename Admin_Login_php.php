<?php

if(isset($_POST['signin']))
{
  $conn = new mysqli('localhost','root','','freshshop');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  echo "Connected successfully";

  $mail = $_POST['email'];
  $password = $_POST['password'];

  if(empty($mail) || empty($password)){
    header("Location:Admin_Login.php?error=emptyfields");
    exit();
  }
  else
  {
    $sql = "SELECT * FROM admin WHERE usernameAdmin = ? OR emailAdmin = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
      header("Location:Admin_Login.php?error=sqlerror");
      exit();
    }
    else {

        mysqli_stmt_bind_param($stmt,"ss",$mail,$mail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($rows = mysqli_fetch_assoc($result))
        {
            $passCheck = password_verify($password,$rows['passwordAdmin']);
            if($passCheck == false)
            {
              header("Location:Admin_Login.php?error=wrongpass");
              exit();
            }
            else if($passCheck == true)
            {
              session_start();
              $_SESSION['username'] = $rows['usernameAdmin'];
              $_SESSION['userID'] = $rows['idAdmin'];

              header("Location:index_Admin.php?login=success&username=".$rows['usernameAdmin']);
              exit();
            }

        }
        else {
          header("Location:Admin_Login.php?error=nouser");
          exit();
        }
    }
  }



}
else
{
  header("Location:Admin_Login.php");
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
