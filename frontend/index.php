<?php require_once('../common/core/init.php') ?>
<?php require_once('includes/_header.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php
/** @var PDO $pdo */
$where = [];
if (!empty($_GET['id_categorie'])) {
    $id = (int)$_GET['id_categorie'];
    $where[] = "categorie_id = $id";
}
$total = announcementCount($pdo, $where);
$anouncments = announcementList($pdo, $where, pagination: pagination($total));
?>
    <?php require_once('../_alerts.php') ?>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($anouncments as $anouncment) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= FILES_URL, 'announcement/', $anouncment['photo'] ?>" alt="<?= $anouncment['description_courte'] ?>" class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <p class="card-text"><?= $anouncment['titre'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= 'view-announcement.php?', http_build_query(['id_annonce' => $anouncment['id_annonce']]) ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-body-secondary"><?= date('Y-m-d', strtotime($anouncment['date_enregistrement'])) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php require_once('../_pagination.php') ?>
                </div>
            </div>
        </div>
    </div>
<?php require_once('includes/_footer.php') ?>