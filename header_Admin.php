<?php
//session_start();
?>
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
                  <?php

                    // echo "<p>".$_SESSION['userID']."</p>";
                    if(isset($_SESSION['userID']))
                    {
                      echo    '
                            <li class="dropdown">
                                <a href="#"  data-toggle="dropdown"><img src='."images/admin/".$_SESSION['userID'].".png height='40px' width='40px' class='rounded-circle' style='margin-left:90%;'></a>
                                <ul class="."dropdown-menu"." style='margin-top:30px;margin-left:80%;'>
                                <li style='text-align:center;'>Welcome<br>".$_SESSION['username']."</li>
                                <li><a href="."logout.php"." style='text-align:center;margin-right: 10%;
                                text-decoration: none;color:#b0b435;
                                display: block;'>Logout</a></li>
                                </ul>
                            </li>
                            ";
                    }
                    else{
                    //   echo "<div class='login-box'>
                    //         <button type='button' style='color: #fff; background-color: #b0b435; border-radius: 0.312rem;' onclick="."document.location='Admin_Login.php'".">Admin</button>
                    //         </div>";
                    //   echo "<div class='login-box'>
                    //         <button type='button' style='color: #fff; background-color: #b0b435; border-radius: 0.312rem;' onclick="."document.location='Sign_in.php'".">Sign in</button>
                    //         </div>";
                    //   echo "<div class='login-box'>
                    //         <button type='button' style='color: #fff; background-color: #b0b435; border-radius: 0.312rem;' onclick="."document.location='Sign_up.php'".">Sign up</button>
                    //         </div>";
                        // echo "<div class='login-box'>
                        //        <button type='button' style='color: #fff; background-color: #b0b435; border-radius: 0.312rem;' onclick="."document.location='logout.php'".">Logout</button>
                        //         </div>";
                        
                    }
                    ?>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index_Admin.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="veg.php">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="users.php">User</a></li>
                        <!-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu">
								                <li><a href="#">Add</a></li>
                                <li><a href="#">Show</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- End Side Menu -->
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
