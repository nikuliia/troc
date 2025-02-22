<?php
if (!userConnectedAdmin()) {
    alertError('Have not access to this page!');
    header("Location: " . URL_FRONTEND . 'index.php');
    exit();
}