<?php
require_once('../common/core/init.php');
require_once('../common/user/crud.php');
require_once('../common/user/validation.php');

// Redirecting user to the main page if he is not connected
if (!userConnected()) {
    header("Location:index.php");
    exit();
}

// removing the user session to log them out
logout();
// redirects them to the main page and exits immediately
header("Location:index.php");
exit();
