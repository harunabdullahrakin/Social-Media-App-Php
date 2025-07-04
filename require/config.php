<?php

$user = 'amarworld';

$password = 'rakingta6';

$db = 'amarworld_main';

$host = 'mysql-amarworld.alwaysdata.net';

$port = 3306;

$conn = mysqli_connect($host, $user, $password, $db,$port) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
