<?php

// Include required variables
require($_SERVER['DOCUMENT_ROOT'] . '/require/variables.php');

if (isset($_POST['drop_comments'])) {
    // Ensure parameters are set
    if (!isset($_POST['post_id']) || !isset($_POST['comment_id'])) {
        $send = "/comments?post_id=" . ($_POST['post_id'] ?? '') . "&error_message=Invalid Parameters";
        header("location: $send");
        exit;
    }

    $post_id = intval($_POST['post_id']);
    $comment_id = intval($_POST['comment_id']);

    Drop_Comment($comment_id, $post_id);
} else {
    $send = "/comments?post_id=" . ($_POST['post_id'] ?? '') . "&error_message=Unrecognized Request";
    header("location: $send");
    exit;
}

function Drop_Comment($comment_id, $post_id) {
    include DB;

    $SQL = "DELETE FROM Comments WHERE COMMENT_ID = ?";
    $stmt = $conn->prepare($SQL);

    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        $send = "/comments?post_id=$post_id&error_message=Database Error";
        header("location: $send");
        exit;
    }

    $stmt->bind_param("i", $comment_id);

    if ($stmt->execute()) {
        $send = "/comments?post_id=$post_id&success_message=Opinion Successfully Dropped";
        header("location: $send");
        exit;
    } else {
        error_log("Execute failed: " . $stmt->error);
        $send = "/comments?post_id=$post_id&error_message=Problem With Drop Your Post";
        header("location: $send");
        exit;
    }
}
