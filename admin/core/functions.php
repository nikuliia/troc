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

function dd(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    die();
}

function lengthBetween(string $value, int $min, int $max): bool
{
    $length = strlen($value);
    return $length >= $min && $length <= $max;
}