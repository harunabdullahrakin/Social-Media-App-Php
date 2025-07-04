<?php


// Adds Variables
require($_SERVER['DOCUMENT_ROOT'] . 'require/variables.php');


    session_start();
    include_once DB;
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM Users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>