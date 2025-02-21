<?php require_once('../../common/core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_note: int,
 *       membre_id1: int,
 *       membre_id2: int,
 *       note: int,
 *       avis: string,
 *       date_enregistrement: string,
 *  }|null $item
 */
$stmt = $pdo->query(sprintf("SELECT id_note, membre_id1, membre_id2, note, avis, date_enregistrement FROM troc.note WHERE id_note = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Annonce #<?= $item['id_note'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_note'] ?></h5>
            <p class="card-text">User ID1: <?= $item['membre_id1'] ?></p>
            <p class="card-text">User ID2: <?= $item['membre_id2'] ?></p>
            <p class="card-text">Rating: <?= $item['note'] ?></p>
            <p class="card-text">Review: <?= $item['avis'] ?></p>
            <p class="card-text">Registration Date: <?= $item['date_enregistrement'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'note_update.php?', http_build_query(['id' => $item['id_note']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
