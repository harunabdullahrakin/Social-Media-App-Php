<?php

include(DB);

$user_id = $_SESSION['id'];

$post_id = $post['Video_ID'];

$sql = "SELECT * FROM likes_vid WHERE User_ID = $user_id AND Video_ID = $post_id;";

$stmt = $conn->prepare($sql);

$stmt->execute();

$stmt->store_result();

if ($stmt->num_rows() > 0)
{
    $reaction_status = true;
}else
{
    $reaction_status = false;
}

