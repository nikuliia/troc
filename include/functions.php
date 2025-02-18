<?php


function debug($var, $mode = 1)
{

    $trace = debug_backtrace();
    $trace = array_shift($trace);

//    echo "<pre>"; print_r($trace); echo "</pre>";
    echo "Debug demandé à la ligne <strong>{$trace['line']} </strong>> dans le fichier<strong> {$trace['file']} </strong>";

    echo "<pre>";
    if ($mode === 1) {
        print_r($var);
    } else {
        var_dump($var);
    }
    echo "</pre>";

//    if ($mode === 1) {
//        echo "<pre>";
//        print_r($var);
//        echo "</pre>";
//    } else {
//        echo "<pre>";
//        var_dump($var);
//        echo "</pre>";
//    }

}

// in session the info of a connected user is stored (does it exist? we connect; doesn't exist? will throw him to the page to connect himself)
// isset is boolean (can give TRUE or FALSE, nothing else)
function userConnected()
{

    if (!isset($_SESSION['user'])) {
        return FALSE;
    } else {
        return TRUE;
    }

}

function userConnectedAdmin()
{
    if (userConnected() && $_SESSION['user']['status'] == 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}

