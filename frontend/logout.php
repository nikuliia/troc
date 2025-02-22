<?php
require_once('../common/core/init.php');
require_once('../common/user/crud.php');
require_once('../common/user/validation.php');

// Redirecting user to the main page if he is not connected
if (!userConnected()) {
    header("Location:index.php");
    exit();
}
logout();
header("Location:index.php");
exit();
