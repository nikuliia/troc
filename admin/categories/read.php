<?php require_once('../core/init.php') ?>
<?php require_once('../../common/categories/crud.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_categorie: int,
 *       titre: string,
 *       motscles: string,
 *  }|null $item
 */
$item = categoryById((int)$_GET['id'], $pdo);
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category #<?= $item['id_categorie'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_categorie'] ?></h5>
            <p class="card-text">Categorie title: <?= $item['titre'] ?></p>
            <p class="card-text">Keywords: <?= $item['motscles'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'update.php?', http_build_query(['id' => $item['id_categorie']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
