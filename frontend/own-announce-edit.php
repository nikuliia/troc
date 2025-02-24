<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/announcement/validation.php') ?>
<?php
/** @var PDO $pdo */

// editing an announcement
$announceId = (int)$_GET['id_annonce'];
if (!userConnected() || !$announceId) {
    header("Location:index.php");
    exit();
}
if (!empty($_POST)) {
    $data = $_POST;
    $data['membre_id'] = userId();
    $data['id_annonce'] = $announceId;
    $isValid = isValid($data);
    $sentFile = !empty($_FILES['photo']['name']);
    if ($sentFile) {
        $isValid = $isValid && isValidPhoto();
    }

    if ($isValid) {
        $sentFile = !empty($_FILES['photo']['name']);
       if ($sentFile && isValidPhoto()){
           $data['photo'] = saveUploadedFile(
               directory: FILES_PATH . 'announcement/',
               fileInputName: 'photo',
           );
       }
        if (updateAnnouncement($data, $pdo)) {
            alertSuccess('Announce updated succesfully');
            header("Location:" . URL_FRONTEND . "own-announces.php");
            exit();
        }
    }
}
$item = announcementById($announceId, $pdo);
if ($item['membre_id'] !== userId()) {
    header("Location:index.php");
    exit();
}
?>
<?php require_once('includes/_header.php') ?>
<div class="container">
    <?php require_once('../_alerts.php') ?>
    <form method="post" enctype="multipart/form-data">
        <?php require_once('includes/announce-inputs.php')?>
    </form>
</div>
<?php require_once('includes/_footer.php') ?>

