<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/comments/crud.php') ?>
<?php
/** @var PDO $pdo */

// delete a comment
try {
    deleteComment((int)$_GET['id'], $pdo);
    alertSuccess('Comment successfully deleted.');
} catch (PDOException $e) {
    alertError('Something went wrong while trying to delete a comment');
}
header('location: index.php');