<?php
// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

require INIT;

session_regenerate_id(true);

$function_out = strcmp($_SESSION['usertype'], '1');

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
  <title>Amar World</title>


  <!--Css/js trash-->



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <link rel="stylesheet" href="/assets/css/style.css">

  <link rel="stylesheet" href="/assets/css/section.css">

  <link rel="stylesheet" href="/assets/css/posting.css">

  <link rel="stylesheet" href="/assets/css/right_col.css">

  <link rel="stylesheet" href="/assets/css/responsive.css">

  <link rel="stylesheet" href="/assets/css/camara-upload.css">

  <link rel="stylesheet" href="/assets/css/links.css">

  <link rel="stylesheet" href="/notifast/notifast.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



</head>
<body>
<?php require NAV; ?>

  <!-- New Section -->





  
<!-- Using Bootstrap Grid System -->

<div class="container">

  <div class="row">

    <div class="col">

      <div class="mb-5">

        <form method="post" action="/components/upload/post.php" enctype="multipart/form-data">

          <div class="form-group">

              <h1 class="profile-user-name" style="font-size: 2rem;font-weight: 300;">Create new post
              </h1>

          </div><br>

          <div class="form-group">

            <label for="caption">Description</label>

            <!--<input type="text" class="form-control" id="caption" aria-describedby="caption-area" placeholder="caption here" onchange="get_caption();" name="caption">-->

            <textarea type="text" class="form-control" id="caption" rows="4"  placeholder="What's On Your Mind, <?php echo $_SESSION['username']; ?>?" onchange="get_caption();" name="caption" maxlength="500"></textarea>

          </div><br>

          <div class="form-group">

            <label for="tag-id">Tags</label>

            <input type="text" class="form-control" id="tag-id" aria-describedby="caption-area" placeholder="#amarworldontop #harun" onchange="get_hash();" name="hash-tags">

          </div><br>

          <div class="form-group">

            <label for="tag-id">Add Image (Image Files png/jpg)</label>

            <input class="form-control" type="file" id="formFile" onchange="preview()" name="image">

          </div>

          <br>

          <div class="form-group">

            <button type="submit" class="btn btn-primary" name="posting">Submit</button>

            <button onclick="clearImage()" class="btn btn-primary">Clear Preview</button>

          </div>

        </form>

      </div>

    </div>

    <div class="col sm-hidden" id="uploaderid">

      <h1 class="profile-user-name" style="font-size: 2rem;font-weight: 300;">Live Preview</h1><br>

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
      
      <div class="post">

        <div class="info">

          <div class="user">

            <div class="profile-pic"><img src="assets/images/temp_profile.webp"></div>

            <p class="username"></p>

          </div>

          <i class="fas fa-ellipsis-v options"></i>

        </div>

        <img src="/assets/images/no-photo.png" id="frame" class="post-img">


        <div class="post-content">

          <div class="reactions-wrapper">

            <i class="icon fas fa-thumbs-up"></i>

            <i class="icon fas fa-comment"></i>

          </div>

          <p class="description" id="caption-data">

            <span>Description : <br></span>

            your beautiful thoughts!

          </p>

          <p class="post-time" id="current-date">2024/10/29</p>

          <p class="post-time" id="hash-tags" style="color: #3942e7;"><i>#lovlyday #cats</i></p>

        </div>

      </div>

    </div>

</div>

</div>



<!--search-->


<?php

include SEARCH;


?>

<script src="/assets/js/preview-helper.js"> </script>

<script src="/notifast/notifast.min.js"></script>

<script src="/notifast/function.js"></script>

<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "/home";
    };
</script>
</body>
</html>