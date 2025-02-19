<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string[]> $alerts
 * @var array{
 *       id_commentaire: int,
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *       date_enregistrement: string,
 *  }|null $item
 */
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("INSERT INTO troc.commentaire (membre_id, annonce_id, commentaire, date_enregistrement) VALUES (:membre_id, :annonce_id, :commentaire, :date_enregistrement)");
    $stmt->bindValue(':membre_id', $_POST['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':annonce_id', $_POST['annonce_id'], PDO::PARAM_INT);
    $stmt->bindValue(':commentaire', $_POST['commentaire']);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);
    if (!$stmt->execute()) {
        $alerts[ALERT_ERROR][] = 'Something went wrong while updating comments.';
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new comment</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('comments_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
