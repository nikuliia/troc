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
    <div class="card" style="max-width: 300px">
        <img src="<?= FILES_URL, '/announcement/', $item['photo'] ?>" class="card-img-top" alt="<?= $item['titre'] ?>">
        <div class="card-body">
            <h5 class="card-title">Comment ID: <?= $item['id_annonce'] ?></h5>
            <p class="card-text">Title: <?= $item['titre'] ?></p>
            <p class="card-text">Short desc: <?= $item['description_courte'] ?></p>
            <p class="card-text">Longue desc: <?= $item['description_longue'] ?></p>
            <p class="card-text">Price: <?= $item['prix'] ?></p>
            <p class="card-text">Photo: <?= $item['photo'] ?></p>
            <p class="card-text">Country: <?= $item['pays'] ?></p>
            <p class="card-text">City: <?= $item['ville'] ?></p>
            <p class="card-text">Address: <?= $item['adresse'] ?></p>
            <p class="card-text">Zip: <?= $item['cp'] ?></p>
            <p class="card-text">User ID: <?= $item['membre_id'] ?></p>
            <p class="card-text">Categorie ID: <?= $item['categorie_id'] ?></p>
            <p class="card-text">Registration Date: <?= $item['date_enregistrement'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'update.php?', http_build_query(['id' => $item['id_annonce']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
