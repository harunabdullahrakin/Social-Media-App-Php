<?php


    session_start();
    include_once DB;

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM Users WHERE NOT unique_id = {$outgoing_id} AND (FULL_NAME LIKE '%{$searchTerm}%' OR USER_NAME LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found!';
    }
    echo $output;
?>