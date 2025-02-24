<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/announcement/validation.php') ?>
<?php
/** @var PDO $pdo */

// adding a new announcement by a user
if (!userConnected()) {
    header("Location:index.php");
    exit();
}

if (!empty($_POST)) {
    $data = $_POST;
    $data['membre_id'] = userId();
    if (isValidPhoto()) {
        $data['photo'] = saveUploadedFile(
            directory: FILES_PATH . 'announcement/',
            fileInputName: 'photo',
        );

        if (isValid($data) && createAnnouncement($data, $pdo)) {
            alertSuccess('Announcement created successfully');
            header("Location:" . URL_FRONTEND . "own-announces.php");
            exit();
        }
    }
}
?>
<?php require_once('includes/_header.php') ?>
<div class="container">
    <?php require_once('../_alerts.php') ?>
    <form method="post" enctype="multipart/form-data">
        <?php require_once('includes/announce-inputs.php') ?>
    </form>
</div>
<?php require_once('includes/_footer.php') ?>

