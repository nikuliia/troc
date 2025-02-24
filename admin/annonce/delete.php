<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/announcement/crud.php') ?>
<?php
/** @var PDO $pdo */

// deleting an announcement
try {
    deleteAnnouncement((int)$_GET['id'], $pdo);
    alertSuccess('Announcement successfully deleted.');
} catch (PDOException $e) {
    alertError('Something went wrong while trying to delete an announcement.');
}
header('location: index.php');