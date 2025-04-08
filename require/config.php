<?php

$user = 'username';

$password = 'password';

$db = 'amarworld_main';

$host = 'host ip';

$port = 'port';

$conn = mysqli_connect($host, $user, $password, $db,$port) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
