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
$isValid = !empty($_POST) && isValid($_POST);
$sentFile = !empty($_FILES['photo']['name']);
if ($sentFile) {
    $isValid = $isValid && isValidPhoto();
}
if ($isValid) {
    $data = $_POST;
    $data['id_annonce'] = (int)$_GET['id'];
    try {
        if ($sentFile) {
            $data['photo'] = saveUploadedFile(
                directory: FILES_PATH . 'announcement/',
                fileInputName: 'photo',
            );
        }
        if (updateAnnouncement($data, $pdo)) {
            alertSuccess('Announcement successfully updated');
            header('Location: index.php');
            exit();
        }
        alertError('Something went wrong while updating annonce.');
    } catch (Exception $e) {
        alertError($e->getMessage());
    }
}
?>
<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Announcement</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
