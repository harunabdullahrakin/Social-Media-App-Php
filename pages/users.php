<?php
// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

require(DB);

?>
<?php
// Check if the 'target_id' is present in the URL query parameters
if(isset($_GET['id']))
{
    // Retrieve the 'target_id' from the URL
    $target_id = $_GET['id'];

    // Ensure the 'target_id' is an integer to prevent SQL injection (basic sanitization)
    $target_id = (int)$target_id;

    // Prepare the SQL query
    $sql = "SELECT * FROM Users WHERE User_ID = ?;";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $target_id); // Bind the integer parameter

    if($stmt->execute())
    {
        // Fetch the result
        $user_array = $stmt->get_result();
        // Here, you would process the result (e.g., display user data)
    }
    else{
        // Redirect to home if the query fails
        header("location: /home");
        exit;
    }
}
else
{
    // Redirect to home if 'target_id' is not set in the URL
    header("location: /home");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Amar World</title>


  <!--Css/js-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


  <link rel="stylesheet" href="/assets/css/style.css">

  <link rel="stylesheet" href="/assets/css/profile-page.css">

  <link rel="stylesheet" href="/assets/css/section.css">

  <link rel="stylesheet" href="/assets/css/posting.css">

  <link rel="stylesheet" href="/assets/css/right_col.css">

  <link rel="stylesheet" href="/assets/css/responsive.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  

</head>
<body style="grid-template-columns:unset !important;">
<?php require NAV; ?>


  <!--Start here-->

  <header class="container" style="color:white;">

<div class="profile-container">

  <?php foreach ($user_array as $array_user){?>

  <div class="profile">

    <div class="profile-image">

      <img src="<?php echo "/storage/pfp/".$array_user['IMAGE'] ?>" alt="profile picture">

    </div>

    <div class="profile-user-settings">

      <h1 class="profile-user-name"><?php echo $array_user['USER_NAME'] ?></h1>

    </div>

    <div class="profile-status">

      <ul>
        <li><span class="profile-status-count"><?php echo $array_user['POSTS'] ?></span> Posts</li>

        <li><span class="profile-status-count"><?php echo $array_user['FALLOWING'] ?></span> Fallowing</li>

        <li><span class="profile-status-count"><?php echo $array_user['FALLOWERS'] ?></span> Followers</li>

      </ul>

    </div>

    <div class="social">

      <ul>
        <li><i class="fas fa-envelope"></i><a href="<?php echo $array_user['EMAIL'] ?>" id="email_id">Email</a></li>

        <li><i class="fab fa-facebook-square"></i><a href="<?php echo $array_user['FACEBOOK'] ?>" id="email_id">Facebook</a></li>

        <li><i class="fab fa-whatsapp-square"></i><a href="<?php echo $array_user['WHATSAPP'] ?>" id="email_id">Whatsapp</a></li>

      </ul>

    </div>

    <div class="profile-bio">

      <p><span class="profile-real-name"><?php echo $array_user['FULL_NAME'] ?></span><?php echo " ".$array_user['BIO'] ?></p>

    </div>

    <form action="">

      <button type="submit" class="fallow-btns">Fallow</button>

    </form>

  <?php }?>

  </div>

</div>

</header>
<!-- design photo gallery -->



<div class="profile-container">

  <div class="gallery">

  <?php include(ROOT.'components/home/get_targetPosts.php')?>

  <?php foreach ($posts as $post){?>

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

  <?php }?>


  </div>

</div>

  

</body>
</html>