<?php require_once('core/init.php') ?>

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
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("UPDATE troc.annonce SET titre = :titre, description_courte = :description_courte, description_longue = :description_longue, prix = :prix, photo = :photo, pays = :pays, ville = :ville, adresse = :adresse, cp = :cp, membre_id = :membre_id, categorie_id = :categorie_id, date_enregistrement = :date_enregistrement  WHERE id_annonce = :id_annonce ");
    $stmt->bindValue(':membre_id1', $_POST['membre_id1'], PDO::PARAM_INT);
    $stmt->bindValue(':membre_id2', $_POST['membre_id2'], PDO::PARAM_INT);
    $stmt->bindValue(':note', $_POST['note'], PDO::PARAM_INT);
    $stmt->bindValue(':avis', $_POST['avis']);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);
    if (!$stmt->execute()) {
        alertError('Something went wrong while updating annonce.');
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Rating</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('rating_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
