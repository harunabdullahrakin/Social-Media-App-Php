<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

session_start();

require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');

include(ROOT . 'require/config.php');

if (isset($_POST['button'])) {
    $fisrt_parm = $_POST['email'];
    $password = md5($_POST['password']);

    // Prepare your SQL query
    $sql_query = "SELECT User_ID, unique_id, FULL_NAME, USER_NAME, USER_TYPE, EMAIL, IMAGE, FACEBOOK, WHATSAPP, BIO, FALLOWERS, FALLOWING, POSTS
                  FROM Users 
                  WHERE (USER_NAME = ? OR EMAIL = ?) 
                  AND PASSWORD_S = ?";

    // Use prepared statements for security and to avoid SQL injection
    $stmt = $conn->prepare($sql_query);
    if ($stmt) {
        $stmt->bind_param("sss", $fisrt_parm, $fisrt_parm, $password); // Bind parameters
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($user_id, $unique_id, $full_name, $user_name, $user_type, $email_address, $image, $facebook, $whatsapp, $bio, $fallowers, $fallowing, $post_count);
            $stmt->fetch();

            // Set session variables
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $user_name;
            $_SESSION['fullname'] = $full_name;
            $_SESSION['email'] = $email_address;
            $_SESSION['usertype'] = $user_type;
            $_SESSION['facebook'] = $facebook;
            $_SESSION['whatsapp'] = $whatsapp;
            $_SESSION['bio'] = $bio;
            $_SESSION['fallowers'] = $fallowers;
            $_SESSION['fallowing'] = $fallowing;
            $_SESSION['postcount'] = $post_count;
            $_SESSION['img_path'] = $image;
            $_SESSION['unique_id'] = $unique_id;

            header("location: /home");
        } else {
            header('location: /login?error_message=Email/Password Incorrect');
            exit;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
} else {
    header('location: login?error_message=Some Error Happened');
    exit;
}

?>
