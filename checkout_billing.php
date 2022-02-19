<?php
session_start();
if(!isset($_SESSION['userID']))
    header("Location:index.php");
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
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include 'header.php'?>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            
            <div class="row">
                <!-- <div class="col-sm-6 col-lg-6 mb-3" style="margin-left:25%;width:100%;"> -->
                <div class="checkout-address">
                                    <div class="title-left">
                                        <h3>Billing address</h3>
                                    </div>
                                    <form class="needs-validation" action="checkout_billingform.php?total=<?php echo $_GET['total']; ?>" method = "POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                            <?php
    
    require 'connect.php';

    $sql = "SELECT * FROM checkout_billing WHERE customerID = ".$_SESSION['userID'];

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);        
    }
    else
    {
        echo 'error';
    }

    ?>
                                                <label for="firstName">First name *</label>
                                                <input type="text" class="form-control" id="firstName" name = "firstname"placeholder="" value="<?php if(isset($row['fname'])) echo $row['fname']; ?>" required>
                                                <div class="invalid-feedback"> Valid first name is required. </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Last name *</label>
                                                <input type="text" class="form-control" id="lastName"name = "lastname" placeholder="" value="<?php if(isset($row['lname'])) echo $row['lname']; ?>" required>
                                                <div class="invalid-feedback"> Valid last name is required. </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control" id="address" name = "Address" placeholder="" value = "<?php if(isset($row['addresses'])) echo $row['addresses']; ?>"required>
                                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Country *</label>
                                                <select class="wide w-100" id="country" name="country" value = "<?php if(isset($row['country'])) echo $row['country']; ?>">
                                                <option value="Choose..." data-display="Select">Choose...</option>
                                                <option value="United States" <?php if(isset($row['country'])) if($row['country'] == 'United States') echo 'selected'; ?>>United States</option>
                                                <option value="India" <?php if(isset($row['country'])) if($row['country'] == 'India') echo 'selected'; ?>>India</option>
                                            </select>
                                                <div class="invalid-feedback"> Please select a valid country. </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="state">State *</label>
                                                <select class="wide w-100" id="state" name="state" >
                                                <option data-display="Select" >Choose...</option>
                                                <option value="California" <?php if(isset($row['states'])) if($row['states'] == 'California') echo 'selected'; ?>  >California</option>
                                                <option value="Gujarat" <?php if(isset($row['states'])) if($row['states'] == 'Gujarat') echo 'selected'; ?>  >Gujarat</option>
                                            </select>
                                                <div class="invalid-feedback"> Please provide a valid state. </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip *</label>
                                                <input type="text" class="form-control" id="zip" name = "zip" placeholder="" value = "<?php if(isset($row['zip'])) echo $row['zip']; ?>" required>
                                                <div class="invalid-feedback"> Zip code required. </div>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        
                                        <!-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-info">
                                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                        </div> -->
                                        <!-- <hr class="mb-4"> -->
                                        <div class="title"> <span>Payment</span> </div>
                                        <div class="d-block my-3">
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"  value="1" <?php if(isset($row['payment_method'])) if($row['payment_method'] == 1) echo "checked"; ?> required>
                                                <label class="custom-control-label" for="credit">Credit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"  value="2" <?php if(isset($row['payment_method'])) if($row['payment_method'] == 2) echo "checked"; ?> required>
                                                <label class="custom-control-label" for="debit">Debit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"  value="3" <?php if(isset($row['payment_method'])) if($row['payment_method'] == 3) echo "checked"; ?> required>
                                                <label class="custom-control-label" for="paypal">Paypal</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-name">Name on card</label>
                                                <input type="text" class="form-control" id="cc-name" placeholder="" name ="cardname" value = "<?php if(isset($row['cardname'])) echo $row['cardname']; ?>"required> <small class="text-muted">Full name as displayed on card</small>
                                                <div class="invalid-feedback"> Name on card is required </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-number">Credit card number</label>
                                                <input type="text" class="form-control" id="cc-number" placeholder="" name="cardnumber" value ="<?php if(isset($row['cardnumber'])) echo $row['cardnumber']; ?>" required>
                                                <div class="invalid-feedback"> Credit card number is required </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">Expiration</label>
                                                <input type="text" class="form-control" id="cc-expiration" placeholder="" name="date" value="<?php if(isset($row['exp_date'])) echo $row['exp_date']; ?>" required>
                                                <div class="invalid-feedback"> Expiration date required </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">CVV</label>
                                                <input type="password" class="form-control" id="cc-cvv" placeholder="" name="cvv" value = "<?php if(isset($row['cvv'])) echo $row['cvv']; ?>" required>
                                                <div class="invalid-feedback"> Security code required </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="payment-icon">
                                                    <ul>
                                                        <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                                        <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                                        <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                                        <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                                        <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mb-1"> <br>
                                        <button class="btn hvr-hover" style="color:white;margin-left:40%;width:200px;height:50px;" type="submit" name = "submit" >Submit</button>
                                        </form>
                                        
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!-- End Cart -->

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


    <!-- Start Footer  -->
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
