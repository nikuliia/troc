<?php require_once('../core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_commentaire: int,
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *       date_enregistrement: string,
 *  }|null $item
 */
$stmt = $pdo->query(sprintf("SELECT id_commentaire, membre_id, annonce_id, commentaire, date_enregistrement FROM troc.commentaire WHERE id_commentaire = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comment #<?= $item['id_commentaire'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_commentaire'] ?></h5>
            <p class="card-text">User ID: <?= $item['membre_id'] ?></p>
            <p class="card-text">Listing ID: <?= $item['annonce_id'] ?></p>
            <p class="card-text">Comment: <?= $item['commentaire'] ?></p>
            <p class="card-text"><?= $item['date_enregistrement'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'update.php?', http_build_query(['id' => $item['id_commentaire']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
