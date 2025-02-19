<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string> $alerts
 * @var array{
 *       id_categorie: int,
 *       titre: string,
 *       motscles: string,
 *  }|null $item
 */
$stmt = $pdo->query(sprintf("SELECT id_categorie, titre, motscles FROM troc.categorie WHERE id_categorie = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorie #<?= $item['id_categorie'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_categorie'] ?></h5>
            <p class="card-text">Categorie title: <?= $item['titre'] ?></p>
            <p class="card-text">Keywords: <?= $item['motscles'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= URL, 'categorie_update.php?', http_build_query(['id' => $item['id_categorie']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
