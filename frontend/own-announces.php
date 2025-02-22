<?php require_once('../common/core/init.php') ?>
<?php require_once('includes/_header.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php
/** @var PDO $pdo */
if (!userConnected()) {
    header('Location: login.php');
    exit();
}
$where = [];
$userId = $_SESSION['user']['id_membre'];
if (empty($userId)) {
    header('Location: login.php');
    exit();
}
$anouncments = announcementList($pdo, where: ["membre_id = $userId"]);
?>
<?php require_once('../_alerts.php') ?>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <a class="btn btn-success" href="<?= 'own-anounce-add.php' ?>">Add</a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($anouncments as $anouncment) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= FILES_URL, 'announcement/', $anouncment['photo'] ?>" alt="<?= $anouncment['description_courte'] ?>" class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <p class="card-text"><?= $anouncment['titre'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php $query = http_build_query(['id_annonce' => $anouncment['id_annonce']]) ?>
                                        <a href="<?= 'own-anounce-view.php?', $query ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                        <a href="<?= 'own-anounce-edit.php?', $query ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <a href="<?= 'own-anounce-delete.php?', $query ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                    </div>
                                    <small class="text-body-secondary"><?= date('Y-m-d', strtotime($anouncment['date_enregistrement'])) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php require_once('includes/_footer.php') ?>