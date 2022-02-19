<?php

if(isset($_POST['add_veg']))
{
  $conn = new mysqli('localhost','root','','freshshop');
  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

  echo "Connected successfully";

   $username = $_POST['Name'];
   $price = $_POST['price'];
   $qty = $_POST['qty'];
   $mfg = $_POST['mfgdate'];
   $veg_type=$_POST['type'];

   if(empty($username) || empty($price) || empty($qty) || empty($mfg) || empty($veg_type) ){
     header("Location:add_veg.php?error=emptyfields&username=".$username."&price=".$price."&qty=".$qty."&mfgdate=".$mfg);
     exit();
   }
   else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
   {
     header("Location:add_veg.php?error=invalidProductName&price=".$price."&qty=".$qty."&mfgdate=".$mfg);
     exit();
   }
   else
   {
        $sql = "SELECT veg_name FROM vegetable WHERE veg_name=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location:add_veg.php?error=SQLerror");
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
                header("Location:add_veg.php?error=ProductnameTaken");
                exit();
            }
            else
            {

                $sql = "INSERT INTO vegetable (veg_name,veg_price,veg_qty,veg_mfg,veg_type) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location:add_veg.php?error=SQLerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"sssss",$username,$price,$qty,$mfg,$veg_type);
                    mysqli_stmt_execute($stmt);

                }
            }
        }
   }

   $img_name = mysqli_insert_id($conn);

   mysqli_stmt_close($stmt);
   mysqli_close($conn);

   if(is_uploaded_file($_FILES['file']['tmp_name']))
    {

      if( strstr($_FILES['file']['name'],".exe"))
	        die("It must not be .exe file");

    if($_FILES["file"]["type"] == "image/jpeg" )
    {

        if (file_exists("images/product_photos/" . $img_name . ".jpg"))
        {
            echo '<script>alert("File Already Exists")</script>';
        }
        else
        {
	          copy($_FILES["file"]["tmp_name"],"images/product_photos/" . $img_name . ".jpg");
            header("Location:add_veg.php?insert=yes&file=yes&AddProduct=success");
        }
    }
    else
        echo '<script>alert("Only jpg File can be uploaded")</script>';
      }
    else
        echo '<script>alert("File is not selected/uploded")</script>';

}
else {
  header("Location:". $_SERVER['HTTP_REFERER']);
  exit();
}
?>
