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

      //read from database
      $query = "select * from users where user_name = '$user_name' limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['password'] === $password)
          {

            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: index.php");
            die;
          }
        }
      }
      
      echo "<h1>wrong username or password!</h1>";
    }else
    {
      echo "wrong username or password!";
    }
  }

?>

 
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Login</title>
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
                            <h1 class="section__title-border">LOG</h1>
                            <h1 class="section__title">IN</h1>
                        </div>
                        <p class="calculate__description">
                            If you have a registered account you can log in here 
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
                             Log In <i class="ri-arrow-right-line"></i>
                            </button>
                        </form>
                         <p class="calculate__message" id="calculate-message"></p><br><br>

                         <button type="" class="button button_flex">
                              <a href="signup.php">Click to Signup</a> <br><br>
                            </button>


                    
            </section>
  
  </body>
  </html>