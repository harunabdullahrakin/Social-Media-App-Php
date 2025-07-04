<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


session_start();

include(DB);

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

$user_id = $_SESSION['id'];

$date = date("Y-m-d H:i:s");
    
$sql = "INSERT INTO Comments(POST_ID, USER_ID, COMMENT, DATE)VALUES ($post_id, $user_id, '$comment', '$date');";

echo ($sql);
    
$stmt = $conn->prepare($sql);

if($stmt->execute())
{

}
else
{
    header("location: comment?post_id=" . $post_id."&error_message=Error: Something went wrong");

}

exit;

?>