<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

      //save to database
      $user_id = random_num(20);
      $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

      mysqli_query($con, $query);

      header("Location: login.php");
      die;
    }else
    {
      echo "Please enter some valid information!";
    }
  }


 ?>

 
  <!DOCTYPE html>
  <html>
  <head>
  	<title>SignUp</title>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

        <!--=============== REMIXICON ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
  	

<section class="calculate section">
                <div class="calculate__container container grid">
                    <div class="calculate__content">
                        <div class="section__titles">
                            <h1 class="section__title-border">SIGN </h1>
                            <h1 class="section__title">UP</h1>
                        </div>
                        <p class="calculate__description">
                            If you do not have a registered account you can sign up here 
                        </p>
                        <form method="post" action="" class="calculate__form" id="calculate-form">
                            <div class="calculate__box">
                                <input type="text"  name="user_name" placeholder="user name" class="calculate__input" id="calculate-cm">
                                <label for="" class="calculate__label">user name</label>
                            </div>
                            <div class="calculate__box">
                                <input type="password" name="password" placeholder="password" class="calculate__input" id="calculate-kg">
                                <label for="" class="calculate__label">password</label>
                            </div>

                            <button type="submit" class="button button_flex">
                             Sign Up <i class="ri-arrow-right-line"></i>
                            </button>
                        </form>
                         <p class="calculate__message" id="calculate-message"></p><br><br>

                         <button type="" class="button button_flex">
                              <a href="login.php">Click to Login</a> <br><br>
                            </button>

  
  </body>
  </html>