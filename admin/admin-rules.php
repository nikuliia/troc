<?php

// Check if the user is NOT an admin
if (!userConnectedAdmin()) {
    alertError('Have not access to this page!');
    header("Location: " . URL_FRONTEND . 'index.php');
    exit();
}