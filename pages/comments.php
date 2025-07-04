<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


require ROOT .'require/init.php';

session_regenerate_id(true);

require ROOT . 'require/search.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Amar World</title>


  <!--Css/js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/section.css">

    <link rel="stylesheet" href="/assets/css/posting.css">

    <link rel="stylesheet" href="/assets/css/right_col.css">

    <link rel="stylesheet" href="/assets/css/responsive.css">

    <link rel="stylesheet" href="/assets/css/Comment.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="/notifast/notifast.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body>
<?php require ROOT .'require/navbar.php'; ?>


  <!--Start here-->

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


<?php

include(ROOT .'require/config.php');

if(isset($_GET['post_id']))
{

    $post_identification = $_GET['post_id'];

    $stmt = $conn->prepare("SELECT * FROM Posts WHERE Post_ID = $post_identification;");

    $stmt->execute();

    $post_array = $stmt->get_result();

}
else{
    header('location: /home');

    exit;
}

if(isset($_GET['page_no']) && $_GET['page_no'] != "")
{
    $page_no = $_GET['page_no'];
}else
{
    $page_no = 1;
}

$sql = "SELECT COUNT(*) as total_comments FROM Comments WHERE POST_ID = $post_identification";

$stmt = $conn->prepare($sql);

$stmt->execute();

$total_comments =0;

$stmt->bind_result($total_comments);

$stmt->store_result();

$stmt->fetch();

$total_comments_per_page = 20;

$offest = ($page_no - 1) * $total_comments_per_page;

// that php ceil function return rounded numbers

$total_number_pages = ceil($total_comments/$total_comments_per_page);

$stmt = $conn->prepare("SELECT * FROM Comments WHERE POST_ID = $post_identification ORDER BY COMMENT_ID DESC LIMIT $offest, $total_comments_per_page;");

$stmt->execute();

$comments = $stmt->get_result();
?>

<section class="container">

    <div class="wrapper">

        <!-- Design for left column -->

        <div class="left-col">

            <!-- Wrapper for single posting -->

            <?php
            include(ROOT .'require/get_dataById.php');

            foreach($post_array as $post)
            {
                $data = get_UserData($post['User_ID']);

                $profile_img = $data[2];

                $profile_name = $data[0];?>

                <div class="post" id="post-id">

                    <div class="info">

                        <div class="user">

                            <div class="profile-pic"><img src="<?php echo "/storage/pfp/". $profile_img; ?>"></div>

                            <p class="username"><?php echo $profile_name;?></p>

                        </div>

<?php if (isset($_SESSION['id'])): ?>
                        <?php

                        $id = $_SESSION['id'];

                        if($post['User_ID'] == $id){?>

                        <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>

                        <?php }?>
<?php else: ?>
<?php endif; ?>
                    </div>

                    <img src="<?php echo "/storage/posts/". $post['Img_Path']; ?>" class="post-img">

                    <div id="data-contents">

                        <div class="post-content" id="post-content">
<?php if (isset($_SESSION['id'])): ?>
                            <div class="reactions-wrapper" id="reaction-wrapper">

                                <?php include(ROOT .'components/home/check_like_status.php');?>

                                <?php if($reaction_status){?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_ids" id="post_ids">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #fb3958;" class="icon fas fa-heart" onclick="return unlike();" id="unlike"></i>
                                        </button>
                                    </form>

                                <?php } else{?>

                                    <form>
                                        <input type="hidden" value="<?php echo $post['Post_ID'];?>" name="post_id" id="post_id">
                                        <button style="background: none; border: none;" type="submit" name="reaction">
                                            <i style="color: #22262A;" class="icon fas fa-heart" onclick="return like();" id="like"></i>
                                        </button>
                                    </form>

                                <?php }?>

                            </div>

                            <input type="hidden" value="<?php echo $post['Likes'];?>" id="reaction-counter">

                            <p class="reactions" id="reaction-id"><?php echo $post['Likes'];?> Reactions</p>
<?php else: ?>

<?php endif; ?>
                            <p class="description">

                                <span><?php echo $profile_name;?> Says :<br></span>

                                <?php echo $post['Caption'];?>
                            </p>

                            <p class="post-time"><?php echo date("M,Y,d", strtotime($post['Date_Upload']));?></p>

                            <p class="post-time" style="color: #0b5ed7"><?php echo $post['HashTags'];?></p>

                        </div>

                    </div>

                </div>

            <?php }?>


<?php if (isset($_SESSION['id'])): ?>

            <div class="col-md-12 col-lg-10 col-xl-8 mt-2 mb-2" style="width: 100%; ">

                <div class="card" style="border-radius: 10px; background: #F5F5F5; border-color: white;">

                    <div class="card-body">

                        <div class="d-flex flex-start align-items-center">

                            <div class="comments-section">

                                <img src="<?php echo '/storage/pfp/'.$_SESSION['img_path']?>" class="icon" style="width: 45px; height: 45px;">

                                <form class="comments-section" id="comments-section">

                                    <input type="text" class="comment-box" placeholder="Your Opinion" name="comment" id="comment">

                                    <input type="hidden" name="post_id" value="<?php echo $post['Post_ID']?>" id="post_identity">

                                    <button class="comment-button" type="submit" name="submit"><i class="fa-regular fa-paper-plane fa-lg"

                                        onclick="return comment();"></i></button>

                                </form>

                            </div>

                        </div>

                    </div>
                    

                </div>
                
                <?php else: ?>
                
               
<div style="align-items:center;color:white;">
  <button class="loginbutton" onclick="location.href='https://amarworld.me/login'">
    <svg
      viewBox="0 0 16 16"
      class="bi bi-lightning-charge-fill"
      fill="currentColor"
      height="16"
      width="16"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z"
      ></path></svg
    >Login for comments
  </button>
</div>
<style>
  .loginbutton {
  --bezier: cubic-bezier(0.22, 0.61, 0.36, 1);
  --edge-light: hsla(0, 0%, 50%, 0.8);
  --text-light: rgba(255, 255, 255, 0.4);
  --back-color: 240, 40%;
  
  margin:auto;
  

  cursor: pointer;
  padding: 0.7em 1em;
  border-radius: 0.5em;
  min-height: 2.4em;
  min-width: 3em;
  display: flex;
  align-items: center;
  gap: 0.5em;

  font-size: 18px;
  letter-spacing: 0.05em;
  line-height: 1;
  font-weight: bold;

  background: linear-gradient(
    140deg,
    hsla(var(--back-color), 50%, 1) min(2em, 20%),
    hsla(var(--back-color), 50%, 0.6) min(8em, 100%)
  );
  color: hsla(0, 0%, 90%);
  border: 0;
  box-shadow: inset 0.4px 1px 4px var(--edge-light);

  transition: all 0.1s var(--bezier);
}

.loginbutton:hover {
  --edge-light: hsla(0, 0%, 50%, 1);
  text-shadow: 0px 0px 10px var(--text-light);
  box-shadow: inset 0.4px 1px 4px var(--edge-light),
    2px 4px 8px hsla(0, 0%, 0%, 0.295);
  transform: scale(1.1);
}

.loginbutton:active {
  --text-light: rgba(255, 255, 255, 1);

  background: linear-gradient(
    140deg,
    hsla(var(--back-color), 50%, 1) min(2em, 20%),
    hsla(var(--back-color), 50%, 0.6) min(8em, 100%)
  );
  box-shadow: inset 0.4px 1px 8px var(--edge-light),
    0px 0px 8px hsla(var(--back-color), 50%, 0.6);
  text-shadow: 0px 0px 20px var(--text-light);
  color: hsla(0, 0%, 100%, 1);
  letter-spacing: 0.1em;
  transform: scale(1);
}
</style>
                <?php endif; ?>
                <br>

                <!-- Modal For Post Options-->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <!-- Model For Opinion Options -->
                <div class="modal fade" id="Comment-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Opinion Options</h5>
                            </div>
                            <div class="modal-body" >

                                <i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit-comment" data-bs-whatever="@mdo"></i><a href="" style="color: black; text-decoration: none;">Edit Comment</a><br><br>


                                <form action="/components/home/del_posts_commment.php" method="post">

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <input type="hidden" name="comment_id" value="<?php echo $comment['COMMENT_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="drop_comments"><i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-whatever="@mdo"></i>Delete Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="here">
                <?php

                foreach($comments as $comment)
                {
                    $data = get_UserData($comment['USER_ID']);

                    ?>

                    <div class="card mb-2" style="border-radius: 10px; background: #F5F5F5; border-color: white;">

                        <div class="card-body">

                            <p style="font-size: 15px;"><?php echo $comment['COMMENT']; ?></p>

                            <div class="d-flex justify-content-between">

                                <div class="d-flex flex-row align-items-center">

                                    <img class="mr-3" src="<?php echo "/storage/pfp/" . $data[2]; ?>" alt="avatar" width="35" height="35" style="border-radius: 50%;"/>

                                    <p class="small mb-0 m-lg-2"><?php echo "\t".$data[0]; ?></p>

                                    <p class="text-muted small mb-0 m-lg-1"><?php echo "Posted Date : ".$comment['DATE']; ?></p>

                                </div>

                                <?php

                                $id = $_SESSION['id'];

                                if($comment['USER_ID'] == $id){?>

                                    <i class="fas fa-ellipsis-v options" data-bs-toggle="modal" data-bs-target="#Comment-Modal"></i>

                                <?php }?>

                            </div>

                        </div>

                    </div>

                <?php }?>

                </div>

                <!--Pagination bar-->
                <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">

                    <ul class="pagination">

                        <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">

                            <a class="page-link" href="<?php if($page_no<=1){echo'#';}else{ echo 'single-post.php?post_id='.$post_identification.'&page_no='. ($page_no-1); }?>"><</a>

                        </li>

                        <li class="page-item <?php if($page_no>= $total_number_pages){echo 'disabled';}?>">

                            <a class="page-link" href="<?php if($page_no>=$total_number_pages){echo "#";}else{ echo 'single-post.php?post_id='.$post_identification.'&page_no='.($page_no+1);}?>">></a>

                        </li>
                    </ul>
                </nav>

            </div>



            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/components/home/edit-post.php">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Hash Tags</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hash-tag" value="<?php echo $post['HashTags'];?>" maxlength="20">
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Caption</label>
                                    <textarea class="form-control" id="message-text" maxlength="500" name="caption"><?php echo $post['Caption'];?></textarea>
                                </div>

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">
                                <button type="submit" class="btn btn-outline-primary" name="edit">Edit Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="delete_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h5>Are You Really Want To Drop That Post ?</h5>

                            <p class="h6">
                                You will lose any associated comments and reactions made in relation to that post if you take that step.
                            </p>

                            <form action="Delete_Normal_Posts.php" method="post">
                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="drop">Drop Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-comment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="post" action="/components/home/edit-comment.php">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Your Opinion</label>
                                    <textarea class="form-control" id="message-text" maxlength="500" name="comment"><?php echo $comment['COMMENT']; ?></textarea>
                                </div>

                                <input type="hidden" name="comment_id" value="<?php echo $comment['COMMENT_ID'];?>">

                                <input type="hidden" name="post_id" value="<?php echo $post['Post_ID'];?>">

                                <button type="submit" class="btn btn-outline-primary" name="edit-comment">Edit Your Opinion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <!-- Design for right column -->



    </div>

</section>

<!-- Js -->


<script src="/notifast/notifast.min.js"></script>

<script src="/notifast/function.js"></script>

<script type="text/javascript">

    function like(){

        const post_id = document.getElementById('post_id').value;

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
                $("#data-contents").load(window.location.href + " #data-contents" );
            }
        });
        return false;
    }

    function unlike(){

        const post_ids = document.getElementById('post_ids').value;

        $.ajax({
            type:"post",
            url:"/components/home/unlike.php",
            data:
                {
                    'post_id' :post_ids,
                },
            cache:false,
            success: function (html)
            {
                $("#data-contents").load(window.location.href + " #data-contents" );
            }
        });
        return false;
    }

    function comment(){

        const post_id = document.getElementById('post_identity').value;

        const comment = document.getElementById('comment').value;

        $.ajax({
            type:"post",
            url:"/components/home/comments_action.php",
            data:
                {
                    'post_id' :post_id,

                    'comment' : comment,
                },
            cache:false,
            success: function (html)
            {
                $("#here").load(window.location.href + " #here" );

                clearInput();

                notification_function("Success Message", "No Error", "#0F73FA");
            }
        });

        return false;
    }

    function clearInput()
    {
        const getValue = document.getElementById("comment");

        if (getValue.value !="")
        {
            getValue.value = "";
        }
    }

    $(document).bind("contextmenu",function(e){
        return false;
    });
</script>

<script>
    $(document).ready(function()
    {
        setInterval(function(){
            $("#here").load(window.location.href + " #here");
        }, 10000);
    });
</script>


<script type="text/javascript">

    document.getElementById("logo-img").onclick = function ()
    {
        location.href = "/home";
    };
</script>


  <style>
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

</body>
</html>