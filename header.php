<?php
  //session_start();
 ?>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
 <style>
.login{
    border: none;
    outline: none;
    color: #fff;
    background-color: #b0b435;
    padding: 0.3rem 1.25rem;
    cursor: pointer;
    border-radius: 0.312rem;
    font-size: 1rem;
    float: left;
}
</style>
<div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
              <option>₹ IND</option>
            	<option>¥ JPY</option>
							<option>$ USD</option>
							<option>€ EUR</option>
						</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +91 6355110307</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
<?php
              if(isset($_SESSION['userID']))
              {
            echo    '
                        <li class="dropdown">
                            <a href="#"  data-toggle="dropdown"><img src='."images/profile_photos/".$_SESSION['userID'].".jpg height='40px' width='40px' class='rounded-circle' style='margin-left:50%;'></a>
                            <ul class="."dropdown-menu"." style='margin-top:30px;margin-right:20px;'>
                            <li><a href="."logout.php"." style='text-align:center;margin-right: 10%; 
                            text-decoration: none;color:#b0b435;
                            display: block;'>Logout</a></li>
                            </ul>
                        </li>
                        ";
                     //    echo "<p style='color: #b0b435;font-size:20px;'>".$_SESSION['userID']."</p>";
                  //}

              }
              else{
                echo "<button class='login' type='button' onclick="."document.location='Sign_in.php'".">Sign in</button>";
               // echo "<a class='btn' href='Sign_in.php' style='color:white;background-color:#b0b435;'>fgdvs</a>";
              }
?>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="Admin_Login.php">Admin?</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.php">Sidebar Shop</a></li>
                                <!-- <li><a href="shop-detail.php">Shop Detail</a></li> -->
                                <?php
                                            if(isset($_SESSION['userID']))
                                            {
                                                echo '<li><a href="cart.php">Cart</a></li>';
                                                //echo '<li><a href="checkout_billing.php">Checkout</a></li>';
                                            }
                                ?>

                                
                                <li><a href="my-account.php">My Account</a></li>
                                <!-- <li><a href="wishlist.php">Wishlist</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <?php
                  if(isset($_SESSION['userID']))
                  {
                        // <!-- Start Atribute Navigation -->
                            echo '
                            <div class="attr-nav">
                                <ul>
                                              <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                                              <li class="side-menu">
                                                    <a href="#">
                                                       <i class="fa fa-shopping-bag"></i>
                                                       <!-- <span class="badge">3</span> -->
                                                       <p>My Cart</p>
                                                    </a>
                                               </li>
                                          </ul>
                             </div>
                            ';
                        // <!-- End Atribute Navigation -->
                        echo '</div>';
                        // <!-- Start Side Menu -->
                        echo '<div class="side">
                              <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                              <li class="cart-box">
                                  <ul class="cart-list">';
                        $conn = new mysqli('localhost','root','','freshshop');
                        if ($conn->connect_error)
                          die("Connection failed: " . $conn->connect_error);

                        $sql = "SELECT * FROM cart where customerID=" . $_SESSION['userID'];

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0)
                        {

                          while($row = mysqli_fetch_assoc($result))
                          {
                            $sql1 = "SELECT * FROM vegetable where veg_id=" . $row['veg_id'];

                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);

                            echo'
                                 <li>
                                      <a href="#" class="photo"><img src="images/product_photos/'.$row1['veg_id'].'.jpg" class="cart-thumb" alt="" /></a>
                                      <h6><a href="#">'.$row1['veg_name'].'</a></h6>
                                      <p><span class="price">1x - $'.$row1['veg_price'].'</span></p>
                                </li>
                                  ';
                                }
                            echo '
                                  <li class="total">
                                    <a href="cart.php" class="btn btn-default hvr-hover btn-cart" style="margin-left:30%;">VIEW CART</a>
                                    
                                  </li>
                                </ul>
                              </li>
                            </div>';
                              }
                        // <!-- End Side Menu -->
                  }
                ?>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
