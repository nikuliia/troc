<?php require_once('../../common/core/init.php') ?>
<?php require_once('../../common/rating/crud.php') ?>
<?php require_once('../../common/rating/validation.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php
/** @var PDO $pdo */

if (!empty($_POST) && isValid($_POST) && createRating($_POST, $pdo)) {
    alertSuccess('Rating created successfully.');
    header('Location: index.php');
    exit();
}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new rating</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
