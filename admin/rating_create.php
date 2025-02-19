<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string[]> $alerts
 * @var array{
 *       id_note: int,
 *       membre_id1: int,
 *       membre_id2: int,
 *       note: int,
 *       avis: string,
 *       date_enregistrement: string,
 *  }|null $item
 */
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("INSERT INTO troc.note (membre_id1, membre_id2, note, avis, date_enregistrement) VALUES (:membre_id1, :membre_id2, :note, :avis, :date_enregistrement)");
    $stmt->bindValue(':membre_id1', $_POST['membre_id1'], PDO::PARAM_INT);
    $stmt->bindValue(':membre_id2', $_POST['membre_id2'], PDO::PARAM_INT);
    $stmt->bindValue(':note', $_POST['note'], PDO::PARAM_INT);
    $stmt->bindValue(':avis', $_POST['avis']);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);
    if (!$stmt->execute()) {
        $alerts[ALERT_ERROR][] = 'Something went wrong while updating a rating.';
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new rating</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('rating_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
