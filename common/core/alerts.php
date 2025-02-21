<?php
const ALERT_ERROR = 'danger';
const ALERT_SUCCESS = 'success';

function alertSuccess(string $message): void
{
    $_SESSION['alerts'][ALERT_SUCCESS][] = $message;
}

function alertError(string $message): void
{
    $_SESSION['alerts'][ALERT_ERROR][] = $message;
}

function alertClean(string $type): void
{
    unset($_SESSION['alerts'][$type]);
}
