<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/rating/crud.php') ?>
<?php require_once('../common/rating/validation.php') ?>
<?php
/** @var PDO $pdo */

// Handling the submission of user reviews for an announcement (only logged in users can leave a review)
if (!userConnected()) {
    header("Location:login.php");
    exit();
}

$announcementId = (int)$_GET['id_annonce']; // Getting the Announcement ID from the URL

if (!$announcementId) { // checking it is the ID valid
    header("Location:index.php");
    exit();
}

$exists = existsByUser(userId(), $announcementId, $pdo); //Check if the user has already reviewed this announcement

if ($exists) { // Prevents duplicate reviews
    alertError('You already reviewed this announcement.');
    header("Location:" . URL_FRONTEND . "view-announcement.php?id_annonce=$announcementId");
    exit();
}

$announcement = announcementById($announcementId, $pdo);

if ($announcement['membre_id'] === userId()) {
    alertError('Can\'t leave review on your announcement.');
    header("Location:" . URL_FRONTEND . "view-announcement.php?id_annonce=$announcementId");
    exit();
}
if (!empty($_POST)) {
    $data = $_POST;
    $data['membre_id1'] = userId();
    $data['membre_id2'] = $announcement['membre_id'];
    if (isValid($data) && createRating($data, $pdo)) {
        alertSuccess('Rating succesfully saved');
        header("Location:" . URL_FRONTEND . "view-announcement.php?id_annonce=$announcementId");
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

