<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/rating/crud.php') ?>
<?php require_once('../common/rating/validation.php') ?>
<?php
/** @var PDO $pdo */
if (!userConnected()) {
    header("Location:login.php");
    exit();
}

$anounceId = (int)$_GET['id_annonce'];

if (!$anounceId) {
    header("Location:index.php");
    exit();
}

$exists = existsByUser(userId(), $anounceId, $pdo);

if ($exists) {
    alertError('Your review already exists.');
    header("Location:" . URL_FRONTEND . "view-anounce.php?id_annonce=$anounceId");
    exit();
}

$announcement = announcementById($anounceId, $pdo);

if ($announcement['membre_id'] === userId()) {
    alertError('Can\'t leave review on your announcement.');
    header("Location:" . URL_FRONTEND . "view-anounce.php?id_annonce=$anounceId");
    exit();
}
if (!empty($_POST)) {
    $data = $_POST;
    $data['membre_id1'] = userId();
    $data['membre_id2'] = $announcement['membre_id'];
    if (isValid($data) && createRating($data, $pdo)) {
        alertSuccess('Rating succesfully saved');
        header("Location:" . URL_FRONTEND . "view-anounce.php?id_annonce=$anounceId");
        exit();
    }
}

?>
<?php require_once('includes/_header.php') ?>
<div class="container">
    <?php require_once('../_alerts.php') ?>
    <form method="post">
        <?php require_once('includes/rating-inputs.php')?>
    </form>
</div>
<?php require_once('includes/_footer.php') ?>

