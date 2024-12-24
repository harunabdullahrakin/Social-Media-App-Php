<?php 

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


session_start();

if(isset($_SESSION['id']))
{
  header('location: /home');

  exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

  <meta http-equiv="x-ua-compatible" content="ie=edge" />

  <title>Amar World</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-login-form.min.css" />

</head>

<body >
<!-- Start your project here-->
<section class="vh-100" style="background:white;">
  
<div class="container py-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col col-xl-10">

        <div class="card" style="border-radius: 1rem;" >

          <div class="row g-0"  style="
          background: linear-gradient(#efdcd4, #e5d6c2, #38241e, #e3c8b2);
          border: 2px transparent;
          border-radius: 20px;
      ">

            <div class="col-md-6 col-lg-5 d-none d-md-block">

              <img
                      src="https://i.pinimg.com/564x/30/c4/95/30c495f7ce30739e4757c4b327ee1fad.jpg"
                      alt="login form"
                      class="img-fluid" style="border-radius:1rem ; height:100%;"
              />

            </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              
              <div class="card-body p-4 p-lg-5 text-black "style="    background: #F8F9FD;
    background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
    border-radius: 40px;
    padding: 25px 35px;
    border: 5px solid rgb(255, 255, 255);
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
    margin: 20px;" > 

                <form method="post" action="/components/login/login_action.php">

                  <h5 class="fw-normal mb-3 pb-3" style="  text-align: center;
  font-weight: 900;
  font-size: 30px;
  color: rgb(16, 137, 211);"><b></b></h5>

                  
                <?php if(isset($_GET['error_message'])){ ?>
                  
                  <p id="error_message" class="text-center alert-danger"><?php echo $_GET['error_message'];?></p>
                  
                <?php }?>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="form2Example17">Email Address/Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password"/>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" style="background-color: #19afd4;" type="submit" name="button">Login</button>
                  </div>

                  <a class="small text-muted" href="/reset-password">Forgot password?</a>

                  <p class="mb-5 pb-lg-2" style="color: #19afd4;">Don't have an account? <a href="/signup" style="color: #2696ca;">Register here</a></p>

                  <a href="#!" class="small text-muted">Terms of use.</a>

                  <a href="#!" class="small text-muted">Privacy policy</a>

                </form>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

</div>

</section>

<script type="text/javascript" src="/assets/js/mdb.min.js"></script>


</body>



</html>