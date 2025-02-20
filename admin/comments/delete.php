<?php require_once('../core/init.php') ?>
<?php require_once('../../common/comments/crud.php') ?>
    <!--Место для кода-->

<?php
/** @var PDO $pdo */
try {
    deleteComment((int)$_GET['id'], $pdo);
    alertSuccess('Comment successfully deleted.');
} catch (PDOException $e) {
    alertError('Something went wrong while trying to delete a comment');
}
header('location: index.php');