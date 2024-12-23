<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

require SEARCH;


?>

<?php  include(COMP.'/search/results.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Result</title>
  <link rel="stylesheet" href="/style.css">
  <script type="text/javascript" src="/app.js" defer></script>

<!-- Css/js etc-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

<link rel="stylesheet" href="/assets/css/style.css">

<link rel="stylesheet" href="/assets/css/profile-page.css">

<link rel="stylesheet" href="/assets/css/section.css">

<link rel="stylesheet" href="/assets/css/posting.css">

<link rel="stylesheet" href="/assets/css/right_col.css">

<link rel="stylesheet" href="/assets/css/responsive.css">

<link rel="stylesheet" href="/assets/css/discover.css">

<link rel="stylesheet" href="/assets/css/results.css">


</head>
<body>
<?php require NAV; ?>

  <!-- New Section -->

  <div class="container">



    <?php

    include(DB);


    if (isset($_POST['find'])) {

        $search_input = $_POST['find'];

        $SQL = "SELECT * FROM Posts WHERE Caption LIKE '%$search_input%' OR HashTags LIKE '%$search_input%';";

        $stmt = $conn->prepare($SQL);

        $stmt->execute();

        $posts = $stmt->get_result();
    } else {
        $search_input = "car";

        $stmt = $conn->prepare("SELECT * FROM Posts WHERE Caption like ? OR HashTags like ? limit 12");

        $stmt->bind_param("ss", strval("%" . $search_input . "%"), strval("%" . $search_input . "%"));

        $stmt->execute();

        $posts = $stmt->get_result();
    }
    ?>

<h3>Search Results For <small><?php echo $search_input?></small></h3><br>


<ul class="nav nav-pills nav-justified">

    <li class="active"><a data-toggle="pill" href="#home"><i class="icon fas fa-vote-yea fa-lg"></i>Posts</a></li>

    <li><a data-toggle="pill" href="#menu2"><i class="icon fas fa-users fa-lg"></i>Profiles</a></li>

    <li><a data-toggle="pill" href="#menu3"><i class="icon fas fa-video fa-lg"></i>Videos</a></li>

    <li><a data-toggle="pill" href="#menu-4"><i class="icon fas fa-calendar-check fa-lg"></i>Events</a></li>

</ul>

<div class="tab-content">

    <div id="home" class="tab-pane fade in active">

        <main>

                <div class="discover-container">

                    <div class="gallery">

                        <?php foreach ($posts as $post) { ?>
                         <a href="comments?post_id=<?php echo $post['Post_ID'];?>"> <div class="gallery-items">

                            <img src="<?php echo "/storage/posts/" . $post['Img_Path']; ?>" alt="post"
                                 class="gallery-img">

                            <div class="gallery-item-info">

                                <ul>

                                    <li class="gallery-items-likes"><span
                                                class="hide-gallery-elements"><?php echo $post['Likes']; ?></span>

                                        <i class="icon fas fa-thumbs-up"></i>

                                    </li>

                                    <li class="gallery-items-likes"><span class="hide-gallery-elements">Opinions</span>

                                        <a href="comments?post_id=<?php echo $post['Post_ID'];?>" style="color: white" ><i class="icon fas fa-comment"></i></a>

                                    </li>
                                </ul>

                            </div>

                        </div></a>

                        <?php } ?>

                    </div>

                </div>

        </main>

    </div>
    <div id="menu2" class="tab-pane fade">

        <br>

        <ul class="list-group">

            <?php

            $users = find_Users($search_input);

            foreach ($users as $members) {
                ?>

                <div class="result-section">

                    <li class="list-group-item search-result-item">

                        <img src="<?php echo "../storage/pfp/" . $members['IMAGE']; ?>" alt="profile-image">

                        <div class="profile_card" style="margin-left: 20px;">

                            <div>
                                <p class="username"><?php echo $members['FULL_NAME']; ?></p>

                                <p class="sub-text"><?php echo $members['USER_NAME']; ?></p>

                            </div>

                        </div>

                        <div class="search-result-item-button">

                            <form method="post" action="/users?id=<?php echo $members['User_ID'] ?>">
                                <input type="hidden"  name="target_id">

                                <button type="submit" class="btn btn-outline-primary">Visit Profile</button>
                            </form>

                        </div>

                    </li>
                    <br>

                </div>

            <?php } ?>
        </ul>

    </div>

    <div id="menu-4" class="tab-pane fade">

        <br>
        <ul class="list-group">

            <?php

            $events = find_Events($search_input);

            foreach($events as $event){?>

            <div class="result-section">

                <li class="list-group-item search-result-item">

                    <img src="assets/images/calender.jpg" alt="profile-image">

                    <div class="profile_card" style="margin-left: 20px;">

                        <div>
                            <p class="username"
                               style="text-transform: capitalize;"><?php echo $event['Caption']; ?></p>
                        </div>

                    </div>

                    <div class="search-result-item-button">

                        <button class="btn btn-outline-primary" style="background: white none;">
                            <a href="comment?post_id=<?php echo $event['Event_ID']; ?>" style="text-decoration: none; font-weight: bold;" >
                                View Event
                            </a>
                        </button>

                    </div>

                </li>
                <br>

            </div>
            <?php }?>

        </ul>
    </div>

    <div id="menu3" class="tab-pane fade">

        <br>

        <ul class="list-group">

            <?php

            $shorts = find_Shorts($search_input);

            foreach ($shorts

            as $video){
            ?>

            <div class="result-section">

                <li class="list-group-item search-result-item">

                    <img src="<?php echo 'assets/videos/'. $video['Thumbnail_Path']; ?>" alt="profile-image">

                    <div class="profile_card" style="margin-left: 20px;">

                        <div>
                            <p class="username"

                               <?php $vid_data = "comment?post_id= ".$video['Video_ID'];?>

                                <?php $new_string =  mb_strimwidth($video['Caption'], 0, 200, "....<br><a href='$vid_data'> Read More</a>");?>

                               style="text-transform: capitalize; font-weight: bold; font-size: 13px;"><?php echo $new_string ?></p>

                        </div>

                    </div>

                    <div class="search-result-item-button">

                        <button class="btn btn-outline-primary" style="background: white none;">
                            <a style="font-weight: bold; text-decoration: none;"
                               href="comment?post_id=<?php echo $video['Video_ID']; ?>"
                               >View Video</a></button>
                    </div>

                </li>
                <br>

            </div>

            <?php } ?>
        </ul>
    </div>
</div>

</div>



<style>
    .nav>li>a {
        display:flex !important; 
        justify-content: center;
    }
</style>
</body>
<script type="text/javascript">
    document.getElementById("logo-img").onclick = function () {
        location.href = "/home";
    };
</script>
</html>