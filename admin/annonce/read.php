<?php require_once('../core/init.php') ?>
<?php require_once('../../common/announcement/crud.php') ?>

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

?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Annonce #<?= $item['id_annonce'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <img src="..." class="card-img-top" alt="<?= $item['titre'] ?>">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_annonce'] ?></h5>
            <p class="card-text">titre: <?= $item['titre'] ?></p>
            <p class="card-text">description_courte: <?= $item['description_courte'] ?></p>
            <p class="card-text">description_longue: <?= $item['description_longue'] ?></p>
            <p class="card-text">prix: <?= $item['prix'] ?></p>
            <p class="card-text">photo: <?= $item['photo'] ?></p>
            <p class="card-text">pays: <?= $item['pays'] ?></p>
            <p class="card-text">ville: <?= $item['ville'] ?></p>
            <p class="card-text">adresse: <?= $item['adresse'] ?></p>
            <p class="card-text">cp: <?= $item['cp'] ?></p>
            <p class="card-text">membre_id: <?= $item['membre_id'] ?></p>
            <p class="card-text">categorie_id: <?= $item['categorie_id'] ?></p>
            <p class="card-text">date_enregistrement: <?= $item['date_enregistrement'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'update.php?', http_build_query(['id' => $item['id_annonce']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
