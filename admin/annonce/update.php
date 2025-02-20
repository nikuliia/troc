<?php require_once('../core/init.php') ?>
<?php require_once('../../common/announcement/crud.php') ?>
<?php require_once('../../common/announcement/validation.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_annonce: int,
 *       titre: string,
 *       description_courte: string,
 *       description_longue: string,
 *       prix: int,
 *       photo: string,
 *       pays: string,
 *       ville: string,
 *       adresse: string,
 *       cp: int,
 *       membre_id: int,
 *       categorie_id: int,
 *       date_enregistrement: string,
 *  }|null $item
 */
$item = announcementById((int)$_GET['id'], $pdo);
if (is_null($item)) {
    alertError('Does not exist.');
    header('Location: index.php');
    exit();
}
if (!empty($_POST) && isValid($_POST)) {
    $data = $_POST;
    // TODO save photo into assets/uploads/announcement/images and set $data['photo'] = 'namephoto.ext';
    $data['id_annonce'] = (int)$_GET['id'];
    if (updateAnnouncement($data, $pdo)) {
        alertSuccess('Announcement successfully updated');
        header('Location: index.php');
        exit();
    }
    alertError('Something went wrong while updating annonce.');
}
?>
<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Announcement</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('../annonce/inputs.php') ?>
</form>›
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
