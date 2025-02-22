<?php
require_once('../common/core/init.php');
require_once('../common/user/crud.php');
require_once('../common/user/validation.php');
if (!userConnected()) {
    header("Location:index.php");
    exit();
}
logout();
header("Location:index.php");
exit();
