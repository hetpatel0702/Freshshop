<?php

session_start();
if(!isset($_SESSION['userID']))
    header("Location:index.php");

    if(isset($_POST['sign-up']))
      {
        $name=$_POST['Name'];
        $email=$_POST['email'];
        $pass = $_POST['password'];
        $mob = $_POST['mobile'];
        $que=$_POST['question'];
        $bdate = $_POST['bdate'];
        $gender=$_POST['gender'];

        $uid= $_POST['id'];

        $conn = mysqli_connect("localhost","root","","freshshop");
        if(!$conn)
            die("Connection Error: " . mysqli_connect_error());

        $sql = "UPDATE login SET Username='$name', Email='$email',Password='$pass',Mobile=$mob,bdate='$bdate', Gender='$gender', Fav_food='$que' WHERE customerID=$uid";

        if(mysqli_query($conn, $sql)) {

           header("Location:users.php");
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
      }
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="css/form.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
      <?php include 'header_Admin.php';?>

     <br>

      <div class="title-all text-center">
         <h1>Users</h1>
      </div>
      <br>

      <?php
      $conn = mysqli_connect("localhost","root","","freshshop");
      if(!$conn)
          die("Connection Error: " . mysqli_connect_error());
      $sql = "SELECT * FROM login where customerID=" . $_REQUEST['uid'];
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0)
        $row = mysqli_fetch_assoc($result)
      ?>
      <div class="about-box-main">
          <div class="container">
              <div class="row">
  				          <div class="col-lg-6">
                      <div class="banner-frame"> <img class="img-fluid" src="images/signup.jpg" alt="" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <br>
                      <div class="box">
                                    <h2 style="padding-bottom:10px;">Edit Details</h2>
                                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                      <input type="hidden" name="id" value=<?php echo $_REQUEST['uid']?>>
                                        <div class="inputBox">
                                            <input type="text" name="Name" value="<?php if(isset($row['Username'])) echo $row['Username']; ?>">
                                            <label>Username</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="email" value="<?php if(isset($row['Email'])) echo $row['Email']; ?>">
                                            <label>email</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="password" value="<?php if(isset($row['Password'])) echo $row['Password']; ?>">
                                            <label>Password</label>
                                        </div>
                                        <div class="inputBox">
                                            <input type="text" name="mobile" value="<?php if(isset($row['Mobile'])) echo $row['Mobile']; ?>">
                                            <label>Mobile</label>
                                        </div>

                                        <div class="inputBox">
                                            <input type="text" name="question" value="<?php if(isset($row['Fav_food'])) echo $row['Fav_food']; ?>" placeholder = "Enter your Favourite Food">
                                            <label>Security Question</label>
                                        </div>

                                        <div class = "inputBox">
                                            <input type="date" class="form-control" id="bdate" name="bdate" value="<?php if(isset($row['bdate'])) echo $row['bdate']; ?>">
                                            <label>Date of Birth</label>
                                        </div>

                                        <!-- <div class = "inputBox">
                                            <input type=file name="file" >
                                            <label>Update image</label>

                                        </div> -->

                                        <h6>Gender</h6>
                                        Male<input type="radio"  id="gender1" name="gender" value="1" <?php if(isset($row['Gender'])) if($row['Gender'] == 1) echo "checked"; ?> ><br>
                                        Female<input type="radio" id="gender1" name="gender" value="2" <?php if(isset($row['Gender'])) if($row['Gender'] == 2) echo "checked"; ?> ><br>


                                        <input type="submit" name="sign-up" value="Submit">
                                    </form>
                            </div>
                  </div>
              </div>
          </div>
      </div>

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


  <?php include 'footer.php'?>

  <!-- ALL JS FILES -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- ALL PLUGINS -->
  <script src="js/jquery.superslides.min.js"></script>
  <script src="js/bootstrap-select.js"></script>
  <script src="js/inewsticker.js"></script>
  <script src="js/bootsnav.js."></script>
  <script src="js/images-loded.min.js"></script>
  <script src="js/isotope.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/baguetteBox.min.js"></script>
  <script src="js/form-validator.min.js"></script>
  <script src="js/contact-form-script.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
