<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/form.css">
    <style>
    .registererror{
      text-align: center;
      color: red;
      font-size: 15px;
      margin-top: 10px;
    }
    .registersuccess{
      text-align: center;
      color: green;
      font-weight:1000;
      font-size: 15px;
    }
    .Login{
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
  .Login:hover{
        background-color: black;
    }
</style>
</head>
<body>
        <div class="box">
                <h2 style="margin-bottom:15px;">Sign in</h2>
                <?php
                    if(isset($_GET['error']))
                    {
                        if($_GET['error'] == "emptyfields")
                        {
                            echo '<p class="registererror">Fill Out The Fields!</p>';
                        }
                        else if ($_GET["error"] == "wrongpass")
                        {
                            echo '<p class="registererror">Enter Correct Password</p>';
                        }
                        else if($_GET['error'] == "nouser")
                        {
                            echo '<p class="registererror">Username Does not Exist!</p>';
                        }
                      }
                      else if(isset($_GET['Signup'])){
                            if($_GET['Signup'] == "success")
                            {
                                echo '<p class="registersuccess"> Signup Successful! Please Login</p>';
                            }
                      }
                      else if(isset($_GET['passwordreset'])){
                        if($_GET['passwordreset'] == "Success")
                        {
                            echo '<p class="registersuccess"> Password Reset Successful! Please Login</p>';
                        }
                      }
                      ?>
                      <form action="form_php.php" method="post">
                          <div class="inputBox">
                              <input type="text" name="email-login" placeholder="Email or User">
                              
                          </div>
                          <div class="inputBox">
                              <input type="password" name="password-login" placeholder = "Password">
                          
                          </div>
                          <input class="btn hvr-hover" style="color:white;" type="submit" name="log-in" value="Login" ><br>
                          <button class="btn hvr-hover" style="color:white;" type='button' onclick="document.location='Sign_up.php'">Sign Up</button>
                          <a href="forgotpassword.php">Forgot Password</a>
                    </form>
        </div>
</body>
</html>
