<?php

//session_set_cookie_params(time()+1000,'/','localhost',false,true);

//session_start();

session_start(['cookie_lifetime' => 43200,'cookie_secure' => true,'cookie_httponly' => true]);

?>


<?php
function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    // Calculate weeks without creating a dynamic property
    $weeks = floor($diff->d / 7);
    $diff->d -= $weeks * 7;

    $string = [
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    ];

    foreach ($string as $k => &$v) {
        if ($k === 'w' && $weeks > 0) {
            $v = $weeks . ' ' . $v . ($weeks > 1 ? 's' : '');
        } elseif ($k !== 'w' && $diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>
