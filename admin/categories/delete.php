<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/categories/crud.php') ?>
<?php
/** @var PDO $pdo */
try {
    deleteCategory((int)$_GET['id'], $pdo);
    alertSuccess('Category successfully deleted.');
} catch (PDOException $e) {
    alertError('Something went wrong while trying to delete a category.');
}
header('location: index.php');