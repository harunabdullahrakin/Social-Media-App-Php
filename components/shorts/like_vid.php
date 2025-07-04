<?php

require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');



session_start();

include(DB);

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$user_id = $_SESSION['id'];

$SQL = "INSERT INTO likes_vid(Video_ID, User_ID)VALUES($post_id, $user_id);";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$conn->close();

update_likes($post_id);

function update_likes($post_id)
{
    include(DB);

    $sql = "UPDATE videos SET Likes = Likes+1 WHERE Video_ID = $post_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}


