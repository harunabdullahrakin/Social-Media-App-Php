<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

session_start();

if (!isset($_SESSION['id'])) {
    header('location: /login');

    exit;
}

include(DB);

if (isset($_POST['posting'])) {

    $filename = $_FILES['image']['name'];

    $tempname = $_FILES["image"]["tmp_name"];

    $file_extansion = pathinfo($filename, PATHINFO_EXTENSION);

    $random_number = rand(0, 10000000);

    $file_rename = 'Profile_' . date('Ymd') . $random_number;

    $file_complete = $file_rename . '.' . $file_extansion;

    $folder = "./../../storage/pfp/" . $file_complete;

    move_uploaded_file($tempname, $folder);

    $user_id = $_SESSION['id'];

    update_Profile($user_id, $file_complete);

    header("location: /edit-profile?success_message=Post Successfully updated");

    exit;
}
else
{
    header("location: /edit-profile?error_message=Error Occurred, try again2 - ERROR #009");

    exit;
}


function update_Profile($user_id, $file_name)
{
    include DB;

    $insert_query = "UPDATE Users SET IMAGE = '$file_name' WHERE User_ID = $user_id ;";

    $stmt = $conn->prepare($insert_query);

    if ($stmt->execute()) {

        $_SESSION['img_path'] = $file_name;
    }
}
