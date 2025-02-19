<?php require_once('core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/announcement/validation.php') ?>

<?php
/** @var PDO $pdo */
if (!empty($_POST) && isValid($_POST)) {
    if (createAnnouncement($_POST, $pdo)) {
        alertSuccess('Announcement was created successfully');
        header('Location: annonce_index.php');
        exit();
    }
    alertError('Something went wrong while updating annonce.');
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Annonce</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('annonce_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
