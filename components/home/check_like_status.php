<?php
include(ROOT . 'require/config.php');

$user_id = $_SESSION['id'];
$post_id = $post['Post_ID'];

$sql = "SELECT * FROM likes WHERE User_ID = ? AND Post_ID = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("ii", $user_id, $post_id); // "ii" means both are integers

// Execute the statement
$stmt->execute();

// Store the result
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $reaction_status = true;
} else {
    $reaction_status = false;
}


