<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/rating/crud.php') ?>
<?php
/** @var PDO $pdo */
try {
    deleteRating((int)$_GET['id'], $pdo);
    alertSuccess('Rating successfully deleted.');
} catch (PDOException $e) {
    alertError('Something went wrong while trying to delete a rating');
}
header('location: index.php');