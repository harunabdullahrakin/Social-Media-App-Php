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

require SEARCH;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Shorts</title>



  <!-- Css/js trash-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


  <link rel="stylesheet" href="/assets/css/style.css">

  <link rel="stylesheet" href="/assets/css/section.css">

  <link rel="stylesheet" href="/assets/css/right_col.css">

  <link rel="stylesheet" href="/assets/css/posting.css">

  <link rel="stylesheet" href="/assets/css/responsive.css">

  <link rel="stylesheet" href="/assets/css/profile-card.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" id="js_2"/>

  <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" id="js_1">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</head>
<body>

<?php require NAV; ?>




  <style>
    .post-source{
        
        width: 100%;
        
        height: 500px;
        
        object-fit: cover;
        
        border-radius: 10px;
    
    }
     .style-wrapper{

         width: 90%;

         height: 100px;

         background:  #F5F5F5;

         border: 1px solid #fdfdfd;

         padding: 10px;

         padding-right: 0;

         display: flex;

         align-items: center;

         overflow: hidden;

         border-radius: 10px;
     }

</style>
  <!-- New Section -->
  <section class="container">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col" id="left-col">

                <?php

                include(ROOT.'components/shorts/get_latest_videos.php');

                include(ROOT.'require/get_dataById.php');

                foreach($posts as $post)
                {
                    $data = get_UserData($post['User_ID']);

                    $profile_img = $data[2];

                    $profile_name = $data[0];

                    ?>

                    <div class="post">

                        <div class="info">

                            <div class="user">

                                <div class="profile-pic"><img src="<?php echo "/storage/pfp/". $profile_img; ?>"></div>

                                <p class="username"><?php echo $profile_name;?></p>

                            </div>

                        </div>


                        <video preload="none" poster="<?php echo '/storage/videos/'. $post['Thumbnail_Path']; ?>" controls class="post-source">
                            <source src="<?php echo '../storage/videos/'.$post['Video_Path'];?>" type="video/mp4" type="video/mp4">
                        </video>


                        <?php $element_id = rand(10,1000000); ?>

                        <div id="<?php echo $element_id ?>">

                            <div class="post-content">

                                <div class="reactions-wrapper" id="reaction">

                                    <?php

                                    include(ROOT.'components/shorts/check_like_statusVid.php');?>

                                    <?php if($reaction_status){?>

                                        <form>
                                            <input type="hidden" value="<?php echo $post['Video_ID'];?>" name="post_id">
                                            <button style="background: none; border: none;" type="submit" name="reaction">
                                                <i style="color: #fb3958;" class="icon fas fa-heart" onclick="return unlike(<?php echo $post['Video_ID'];?>);"></i>
                                            </button>
                                        </form>

                                    <?php } else{?>

                                        <form>
                                            <input type="hidden" value="<?php echo $post['Video_ID'];?>" name="post_id">
                                            <button style="background: none; border: none;" type="submit" name="reaction">
                                                <i style="color: #22262A;" class="icon fas fa-heart" onclick="return like(<?php echo $post['Video_ID'];?>);"></i>
                                            </button>
                                        </form>

                                    <?php }?>

                                    <a href="comment?post_id=<?php echo $post["Video_ID"];?>" style="color: #22262A;"><i class="icon fas fa-comment"></i></a>

                                </div>

                                <p class="reactions"><?php echo $post['Likes'];?> Reactions</p>

                                <p class="description">
                                    <span><?php echo $profile_name;?> Says :<br></span>

                                    <?php echo $post['Caption'];?>
                                </p>

                                <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                                <p class="post-time" style="color: #0b5ed7"><?php echo $post['HashTags'];?></p>

                            </div>

                        </div>
                    </div>

                <?php } ?>


            <!--Pagination bar-->
            <nav aria-label="Page navigation example" class="mx-auto mt-3">

                <ul class="pagination">

                    <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">

                        <a class="page-link" href="<?php if($page_no<=1){echo'#';}else{ echo '?page_no='. ($page_no-1); }?>">Previous</a>

                    </li>
                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>

                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                    <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>
                    <?php if($page_no >= 3){?>

                        <li class="page-item"><a class="page-link" href="#">...</a></li>

                        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=". $page_no;?>"></a></li>

                    <?php } ?>

                    <li class="page-item <?php if($page_no>= $total_number_pages){echo 'disabled';}?>">

                        <a class="page-link" href="<?php if($page_no>=$total_number_pages){echo "#";}else{ echo "?page_no=".($page_no+1);}?>">Next</a>

                    </li>
                </ul>
            </nav>
        </div>

        <!-- Design for right column -->


    </div>


</section>

<script type="text/javascript">
  document.getElementById("logo-img").onclick = function ()
  {
      location.href = "/home";
  };
</script>

<script type="text/javascript">

  function like(post_id){

      $.ajax({
          type:"post",
          url:"/components/shorts/like_vid.php",
          data:
              {
                  'post_id' :post_id,
              },
          cache:false,
          success: function (html)
          {
              $('#left-col').load(document.URL +  ' #left-col');

          }
      });
      return false;
  }

  function unlike(post_id, div_id){

      $.ajax({
          type:"post",
          url:"/components/shorts/unlike_vid.php",
          data:
              {
                  'post_id' :post_id,
              },
          cache:false,
          success: function (html)
          {
              $('#left-col').load(document.URL +  ' #left-col');
          }
      });
      return false;
  }

  /*$(document).bind("contextmenu",function(e){
      return false;
  });*/

</script>

</body>
</html>