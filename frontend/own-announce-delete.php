<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/announcement/validation.php') ?>
<?php
/** @var PDO $pdo */
$announceId = (int)$_GET['id_annonce'];
if (!$announceId || !userConnected()) {
    header("Location:index.php");
    exit();
}
$item = announcementById($announceId, $pdo);
if ($item['membre_id'] !== userId()) {
    alertError('Incorrect id of your announcement');
    header("Location:" . URL_FRONTEND . "own-announces.php");
    exit();
}
deleteAnnouncement($announceId, $pdo);