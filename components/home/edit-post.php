<?php
// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


session_start();

include(ROOT. 'require/config.php');

if(isset($_POST['edit']))
{
    $post_id = $_POST['post_id'];

    $post_hash = $_POST['hash-tag'];

    $post_caption = $_POST['caption'];

    Update_Post($post_id, $post_caption, $post_hash);
}
else{
}

function Update_Post($post_id, $post_caption, $post_hash)
{
    include ROOT. 'require/config.php';

    $SQL = "UPDATE Posts SET Caption = '$post_caption', HashTags = '$post_hash' WHERE Post_ID = $post_id;";

    $stmt = $conn->prepare($SQL);

    if ($stmt->execute()) {

        $send = "comments?post_id=$post_id&success_message=Current Post Updated Successfully";

        header("location: $send");

        exit;

    } else {

        $send = "comments?post_id=$post_id&error_message=Problem With Post Update";

        header("location: $send");

        exit;
    }
}

