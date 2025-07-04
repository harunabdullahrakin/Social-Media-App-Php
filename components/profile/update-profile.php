
<?php

// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


require INIT;

session_regenerate_id(true);

include(DB);

include('functions.php');

if(isset($_POST['submit']))
{
    $ID = $_SESSION['id'];

    $full_name = $_POST['full_name'];

    $user_name= $_POST['user_name'];

    $email_address= $_POST['email'];

    $facebook = $_POST['fbook'];

    $whatsapp = $_POST['wapp'];

    $bio = $_POST['bio'];

    $image = $_FILES['image']['temp_name'];

    if($image != "")
    {
        $image_name = $user_name . ".jpg";
    }
    else{

        $image_name =  $_SESSION['img_path'];
    }

    if($user_name != $_SESSION['username'])
    {
        $sql_query = "SELECT USER_NAME FROM Users WHERE USER_NAME = '$user_name';";

        echo $sql_query;

        $stmt = $conn->prepare($sql_query);

        $stmt->execute();

        $stmt->store_result();

        if($stmt->num_rows() > 0)
        {
            header('location: /edit-profile?error_message=User Name Already Taken');

            exit;
        }
        else
        {
            Update_Profile($ID, $full_name, $user_name, $email_address, $facebook, $whatsapp, $bio);
        }
    }
    else
    {
        Update_Profile($ID, $full_name, $user_name, $email_address, $facebook, $whatsapp, $bio);
    }

}
else
{
    header("location: /profile");

    exit;
}

?>