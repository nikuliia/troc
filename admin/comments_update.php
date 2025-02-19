<?php require_once('core/init.php') ?>

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
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("UPDATE troc.commentaire SET membre_id = :membre_id, annonce_id = :annonce_id, commentaire = :commentaire, date_enregistrement = :date_enregistrement  WHERE id_commentaire = :id_commentaire ");
    $stmt->bindValue(':membre_id', $_POST['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':annonce_id', $_POST['annonce_id'], PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $_POST['commentaire']);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);
    if (!$stmt->execute()) {
        alertError('Something went wrong while updating a comment.');
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comment Update</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('comments_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
