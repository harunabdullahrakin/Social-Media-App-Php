<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

require INIT;

session_regenerate_id(true);

if(!isset($_SESSION['id']))
{
  header('location: /login');

  exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Profile</title>




  <!-- Profile css & js-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


  <link rel="stylesheet" href="/assets/css/style.css">

  <link rel="stylesheet" href="/assets/css/profile-page.css">

  <link rel="stylesheet" href="/assets/css/section.css">

  <link rel="stylesheet" href="/assets/css/posting.css">

  <link rel="stylesheet" href="/assets/css/right_col.css">

  <link rel="stylesheet" href="/assets/css/responsive.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/notifast/notifast.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body style="color:white;">



<?php require NAV; ?>



<!--Header/ profile-->

<div class="container" >

  <div class="profile-container">

    <div class="profile">

      <div class="profile-image">

        <img src="<?php echo "../storage/pfp/".$_SESSION['img_path'] ?>" alt="profile picture">

      </div>

      <div class="profile-user-settings">

        <h1 class="profile-user-name"><?php echo $_SESSION['username']; ?></h1>

        <button class="profile-button profile-edit-button" onclick="location.href='edit-profile';">Edit Profile</button>

        <button class="logoutbt" aria-label="profile settings" data-bs-toggle="modal" data-bs-target="#exampleModal">

         <i class="icon fas fa-sign-out-alt"></i>

        </button>


        <style>
.logoutbt {
  width: 89px;
  margin-left: 20px;
  height: 31px;
  cursor: pointer;
  color: #fff;
  font-size: 17px;
  border-radius: 1rem;
  border: none;
  position: relative;
  background: #100720;
  transition: 0.1s;
}

.logoutbt::after {
  content: '';
  width: 100%;
  height: 100%;
  background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(255,94,247,1) 17.8%, rgba(2,245,255,1) 100.2% );
  filter: blur(15px);
  z-index: -1;
  position: absolute;
  left: 0;
  top: 0;
}

.logoutbt:active {
  transform: scale(0.9) rotate(3deg);
  background: radial-gradient( circle farthest-corner at 10% 20%,  rgba(255,94,247,1) 17.8%, rgba(2,245,255,1) 100.2% );
  transition: 0.5s;
}
        </style>


<!-- Showdown start -->

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure? Logout</h5>
              </div>

                <div class="modal-body">
                  <ul style="list-style: none; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 10px; text-decoration: none;">
                    <li><button class="logoutbt" aria-label="profile settings" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="location.href='/components/profile/logout.php';" >Confirm</button></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>

<!-- Showdown end -->

        <?php if(isset($_GET['error_message'])){ ?>

            <?php

            $message = $_GET['error_message'];

            echo"<body onload='notification_function(`Error Message`, `$message`, `#da1857`);'</body>"

            ?>

        <?php }?>

        <?php if(isset($_GET['success_message'])){ ?>

            <?php

            $message = $_GET['success_message'];

            echo"<body onload='notification_function(`Success Message`, `$message`, `#0F73FA`);'</body>"

            ?>

        <?php }?>
      
      <!--<div class="popup" id="popup">

          <div class="popup-window">


          </div>
        
        </div>

      </div>-->

      <div class="profile-status">

        <ul class="profile-buttons" >
          <li><span class="profile-status-count"><?php echo $_SESSION['fallowers'] ?></span> Posts</li>

          <a href="/information" style="text-decoration: none; color: white;"><li><span class="profile-status-count"><?php echo $_SESSION['fallowing'] ?></span> following</li></a>

          <a href="/information" style="text-decoration: none; color: white;"><li><span class="profile-status-count"><?php echo $_SESSION['fallowers'] ?></span> followers</li></a>

        </ul>

      </div>













      <!--<div class="social">       Gmail & Other Stuffs

        <ul>
          <li><i class="fas fa-envelope fa-lg"></i><?php echo " ".$_SESSION['email'] ?></li>

          <li><i class="fab fa-facebook-square fa-lg"></i><?php echo " ".$_SESSION['facebook'] ?></li>

          <li><i class="fab fa-whatsapp-square fa-lg"></i><?php echo " ".$_SESSION['whatsapp'] ?></li>

          <i class="fad fa-campfire"></i>

        </ul>

      </div>-->








      
      <div class="profile-bio">

        <p><span class="profile-real-name"><?php echo $_SESSION['fullname']?></span> <?php echo " ".$_SESSION['bio']?> </p>

      </div>

    </div>

  </div>
  <div>

<div class="profile-container">

  <div class="gallery">

  <?php include(ROOT."components/profile/get-posts.php"); ?>

   <!--loop over the results-->

  <?php foreach($posts as $post){ ?>

    <div class="gallery-items">

      <img src="<?php echo "./../storage/posts/".$post['Img_Path'];?>" alt="post" class="gallery-img">

      <div class="gallery-item-info">

        <ul>

          <li class="gallery-items-likes"><span class="hide-gallery-elements">Reactions : <?php echo $post['Likes'];?></span>

            <i class="icon fas fa-thumbs-up"></i>

          </li><br>
          
        </ul>

      </div>

    </div>

  <?php } ?>

  </div>

</d>


</div>


<!--search-->

<?php

include SEARCH;


?>







</body>
</html>