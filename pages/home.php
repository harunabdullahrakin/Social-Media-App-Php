
<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

require ROOT . 'require/init.php';

session_regenerate_id(true);

if(!isset($_SESSION['id']))
{
  header('location: /login');

  exit;
}

require ROOT . 'require/search.php';


?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Home</title>




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/section.css">
    
    <link rel="stylesheet" href="/assets/css/posting.css">



    <link rel="stylesheet" href="/assets/css/responsive.css">

    <link rel="stylesheet" href="/assets/css/right_col.css">
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>


<?php require ROOT . 'require/navbar.php'; ?>
  <!-- New Section -->









<section class="container">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col" id="left-col">

            <!-- Wrapper For Status -->

            <?php include(ROOT . 'components/home/stories.php');?>

            <!-- Wrapper for posting -->

            <?php include(ROOT . 'components/home/get_latest_posts.php'); ?>





<!--Posts Section posts-->
            <?php

            include(ROOT . 'require/get_dataById.php');

            foreach($posts as $post)
            {
                $data = get_UserData($post['User_ID']);

                $profile_img = $data[2];

                $profile_name = $data[0];

                $id = $data[3];

                ?>

            <div class="post" id="post">

                <div class="info">

                    <a href="/users?id=<?php echo  $id ?>" style="text-decoration:none !important;"><div class="user" onclick="">

                        <div class="profile-pic"><img src="<?php echo "/storage/pfp/". $profile_img; ?>"></div>

                        <p class="username"><?php echo $profile_name;?>・</p>
                        <p class="post-time"><?php echo timeAgo($post['Date_Upload']); ?>
                        </p>


                    </div></a>

                </div>

                <img src="<?php echo "/storage/posts/". $post['Img_Path']; ?>" class="post-img">

                    <div id="post_info_data">

                        <div class="post-content">

                            <div class="reactions-wrapper">

                                <?php include(ROOT . 'components/home/check_like_status.php');?>

                                <?php if($reaction_status){?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_ids" id="post_ids">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #fb3958;" class="icon fas fa-heart fa-lg" onclick="return unlike(<?php echo $post['Post_ID'];?>);"></i>
                                        </button>
                                    </form>

                                <?php } else{?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_id" id="post_id">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #22262A;" class="icon fas fa-heart fa-lg" onclick="return like(<?php echo $post['Post_ID'];?>);"></i>
                                        </button>
                                    </form>

                                <?php }?>

                                <a href="/comments?post_id= <?php echo $post["Post_ID"];?>" style="color: #22262A;"><i class="icon fas fa-comment fa-lg"></i></a>

                                

                            </div>

                            <p class="reactions" id="<?php echo 'reactions_'.$post['Post_ID'];?>" style="margin-top: 0em;"><?php echo $post['Likes'];?> likes</p>

                            <p class="description">
                                <span><?php echo $profile_name;?> <span class="captiontext"><?php echo $post['Caption'];?></span> <br></span>

                                
                            </p>



                        </div>
                    </div>
            </div>

            <?php } ?>







            <!-- Modal For Post Options-->
            <div class="modal fade" id="post-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Post Options</h5>
                        </div>
                        <div class="modal-body">

                            <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Edit Post</a><br><br>

                            <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#delete_model" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Delete Post</a>
                        </div>
                    </div>
                </div>
            </div>









            <!--Page Number bar-->
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

<!--Like dislike files-->

<script>
    function like(post_id){

$.ajax({
    type:"post",
    url:"/components/home/like.php",
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

function unlike(post_id){

$.ajax({
    type:"post",
    url:"/components/home/unlike.php",
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

$(document).bind("contextmenu",function(e)
{
return false;
});
</script>
<style>

@media(max-width:400px) {
    .container {
        max-width:365px !important;
    }
}

</style>
</body>
</html>