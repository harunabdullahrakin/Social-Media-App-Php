<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
 
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
 
  <title>Register・Amar World</title>
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

  <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-login-form.min.css" />

</head>

<body>

  <section class="vh-100" style="background:whitesmoke;">
    
    <div class="container py-5 h-100">

      <div class="row d-flex justify-content-center align-items-center h-100">

        <div class="col col-xl-10">

          <div class="card" style="border-radius: 1rem; ">

            <div class="row g-0">

              <div class="col-md-6 col-lg-5 d-none d-md-block">
                
                <img src="https://i.pinimg.com/564x/e7/de/17/e7de17af8ad159819a8d25768cb92a19.jpg" alt="login form"class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>

              </div>

              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post" id="signup_form" action="/components/signup/signup_process.php">


                <h6 style="text-transform: uppercase; color: grey;" class="mt-2 mb-1"><b><span style="color: #529663;">Hi!</span> Join With Amar World.</b></h6>

                <?php if(isset($_GET['error_message'])){ ?>

                  <p id="error_message" class="text-center alert-danger"><?php echo $_GET['error_message'];?></p>

                <?php }?>

                <?php if(isset($_GET['sucess_message'])){ ?>

                    <p id="sucess_message" class="text-center alert-success"><?php echo $_GET['sucess_message'];?></p>
  
                  <?php }?>

                <div class="form-outline mb-4">
                
                    <input type="mail" id="form2Example17" class="form-control form-control-lg" name="email" onchange="domain_nameValidator();"/>
                
                    <label class="form-label" for="form2Example17">Email address</label>
                
                </div>

                <div class="pt-1 mb-4 mt-2">

                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="signup_btn">Register</button>

                </div>

                <p class="mb-4 pb-lg-2" style="color: #19afd4;">Have an account? <a href="/login" style="color: #2696ca;">

                Log In</a></p>

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

<style>
  .img-fluid, .img-thumbnail {
    max-width: 80%;
    height: auto;
}
</style>
</body>

</html>