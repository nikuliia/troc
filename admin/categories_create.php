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
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("INSERT INTO troc.categorie (titre, motscles) VALUES (:titre, :motscles)");
    $stmt->bindValue(':titre', $_POST['titre']);
    $stmt->bindValue(':motscles', $_POST['motscles']);
    if (!$stmt->execute()) {
        $alerts[ALERT_ERROR][] = 'Something went wrong while updating categories.';
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new categorie</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('categories_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
