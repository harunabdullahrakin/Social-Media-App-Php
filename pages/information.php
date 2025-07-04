<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

include(DB);

session_start();

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


  <!--Css/js-->

  <link rel="stylesheet" href="/assets/css/style.css">

<link rel="stylesheet" href="/assets/css/profile-page.css">

<link rel="stylesheet" href="/assets/css/section.css">

<link rel="stylesheet" href="/assets/css/posting.css">

<link rel="stylesheet" href="/assets/css/right_col.css">

<link rel="stylesheet" href="/assets/css/responsive.css">

<link rel="stylesheet" href="/assets/css/discover.css">

<link rel="stylesheet" href="/assets/css/results.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<?php require NAV; ?>


  <!--Start here-->

  <main>

  <div class="discover-container">

    <div class="gallery">
      <div class="container mt-3">
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills nav-justified" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#home">Followings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#menu1">Followers</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>

              <ul class="list-group">

                  <?php

                  include('../components/profile/results.php');

                  include(ROOT.'require/get_dataById.php');

                  $users = get_My_Followings();

                  foreach($users as $members){

                      $extract_data = get_UserData($members['Other_user_id']);?>

                      <div class="result-section">

                          <li class="list-group-item search-result-item">

                              <img src="<?php echo "/storage/pfp/".$extract_data[2]; ?>" alt="profile-image">

                              <div class="profile_card" style="margin-left: 20px;">

                                  <div>
                                      <p class="username" style="font-weight: bold;"><?php echo $extract_data[1]; ?></p>

                                      <p class="sub-text"><?php echo $extract_data['0']; ?></p>

                                  </div>

                              </div>

                              <div class="search-result-item-button">

                                  <form method="post" action="follower_acc.php">
                                      <input type="hidden" value="<?php echo $members['Other_user_id']?>" name="target_id">

                                      <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                                  </form>

                              </div>

                          </li><br>

                      </div>

                  <?php }?>
              </ul>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>

              <ul class="list-group">

                  <?php

                  $users = get_My_Followers();

                  foreach($users as $members){

                      $extract_data = get_UserData($members['Other_user_id']);?>

                      <div class="result-section">

                          <li class="list-group-item search-result-item">

                              <img src="<?php echo "/storage/pfp/".$extract_data[2]; ?>" alt="profile-image">

                              <div class="profile_card" style="margin-left: 20px;">

                                  <div>
                                      <h6 class="username" style="font-weight: bold;"><?php echo$extract_data[1];?></h6>

                                      <p class="sub-text"><?php echo $extract_data[0]; ?></p>

                                  </div>

                              </div>

                              <div class="search-result-item-button">

                                  <form method="post" action="follower_acc.php">
                                      <input type="hidden" value="<?php echo $members['Other_user_id']?>" name="target_id">

                                      <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                                  </form>

                              </div>

                          </li><br>

                      </div>

                  <?php }?>
              </ul>
          </div>
        </div>
      </div>

    </div>

  </div>


</main>


</body>
<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "/home";
    };
</script>

</html>