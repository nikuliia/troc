<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string[]> $alerts
 * @var array{
 *       id_categorie: int,
 *       titre: string,
 *       motscles: string,
 *  }|null $item
 */
$stmt = $pdo->query(sprintf("SELECT titre, motscles FROM troc.categorie WHERE id_categorie = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("UPDATE troc.categorie SET titre = :titre, motscles = :motcles WHERE id_categorie = :id_categorie ");
    $stmt->bindValue(':titre', $_POST['titre']);
    $stmt->bindValue(':motscles', $_POST['motscles']);
    if (!$stmt->execute()) {
        $alerts[ALERT_ERROR][] = 'Something went wrong while updating annonce.';
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update a categorie</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('categorie_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
