<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/announcement/validation.php') ?>
<?php require_once('../common/comments/crud.php') ?>
<?php
/** @var PDO $pdo */
$anounceId = (int)$_GET['id_annonce'];
if (!userConnected() || !$anounceId) {
    header("Location:index.php");
    exit();
}
$item = announcementById($anounceId, $pdo);
if ($item['membre_id'] !== userId()) {
    header("Location:index.php");
    exit();
}
$comments = commentList($pdo, ['annonce_id' => $item['id_annonce']]);
?>
<?php require_once('includes/_header.php') ?>
<div class="container">
    <?php require_once('../_alerts.php') ?>
    <div class="row">
        <div class="col-4">
            <div class="card shadow-sm">
                <img src="<?= FILES_URL, 'announcement/', $item['photo'] ?>" alt="<?= $item['description_courte'] ?>" class="bd-placeholder-img card-img-top">
                <div class="card-body">
                    <p class="card-text"><?= $item['titre'] ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="<?= 'own-anounce-edit.php?', http_build_query(['id_annonce' => $item['id_annonce']]) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="<?= 'own-anounce-delete.php?', http_build_query(['id_annonce' => $item['id_annonce']]) ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </div>
                        <small class="text-body-secondary"><?= date('Y-m-d', strtotime($item['date_enregistrement'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <h2>Comments</h2>
            <?php foreach ($comments as $comment) { ?>
                <div class="card">
                    <div class="card-body">
                        <p><?= $comment['commentaire'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once('includes/_footer.php') ?>

