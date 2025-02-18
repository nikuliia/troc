<?php

// in session the info of a connected user is stored (does it exist? we connect; doesn't exist? will throw him to the page to connect himself)
// isset is boolean (can give TRUE or FALSE, nothing else)
function userConnected(): bool
{
    return isset($_SESSION['user']);
}

function userConnectedAdmin(): bool
{
    return userConnected() && $_SESSION['user']['status'] == 1;
}

