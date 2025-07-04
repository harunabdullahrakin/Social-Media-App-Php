<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

session_start();

function Update_Profile($ID, $full_name, $user_name, $email_address, $facebook, $whatsapp, $bio)
{
    include DB;

    $insert_query = "UPDATE Users SET FULL_NAME = '$full_name', USER_NAME = '$user_name' ,EMAIL = '$email_address', FACEBOOK = '$facebook', WHATSAPP = '$whatsapp', BIO = '$bio' WHERE User_ID = $ID ;";

    $stmt = $conn->prepare($insert_query);

    if ($stmt->execute()) {
        $_SESSION['id'] = $ID;

        $_SESSION['username'] = $user_name;

        $_SESSION['fullname'] = $full_name;

        $_SESSION['email'] = $email_address;

        $_SESSION['facebook'] = $facebook;

        $_SESSION['whatsapp'] = $whatsapp;

        $_SESSION['bio'] = $bio;

        header("location: /my_Profile?success_message=Profile Updated Successfully");

        exit;

    } else {

        header("location: /edit-profile?error_message=error Occurred");

        exit;
    }
}

?>