<?php

require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


session_start();

include(ROOT ."require/config.php");

$post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';

$user_id = $_SESSION['id'];

$get_Id = "SELECT * FROM likes WHERE User_ID = $user_id AND Post_ID = $post_id;";

$data = mysqli_query($conn, $get_Id);

while($row = mysqli_fetch_assoc($data))
{
    $Like_ID = $row['Like_ID'];
}

$SQL = "DELETE FROM likes WHERE Like_ID = $Like_ID;";

$stmt = $conn->prepare($SQL);

$stmt->execute();

$conn->close();

update_likes($post_id);


function update_likes($post_id)
{
    include(ROOT ."require/config.php");

    $sql = "UPDATE Posts SET Likes = Likes-1 WHERE Post_ID = $post_id;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

?>




