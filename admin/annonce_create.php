<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string[]> $alerts
 * @var array{
 *       id_annonce: int,
 *       titre: string,
 *       description_courte: string,
 *       description_longue: string,
 *       prix: int,
 *       photo: string,
 *       pays: string,
 *       ville: string,
 *       adresse: string,
 *       cp: int,
 *       membre_id: int,
 *       categorie_id: int,
 *       date_enregistrement: string,
 *  }|null $item
 */
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("INSERT INTO troc.annonce (titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, categorie_id, date_enregistrement
) values (:titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp, :membre_id, :categorie_id, :date_enregistrement)");
    $stmt->bindValue(':titre', $_POST['titre'], PDO::PARAM_INT);
    $stmt->bindValue(':description_courte', $_POST['description_courte']);
    $stmt->bindValue(':description_longue', $_POST['description_longue']);
    $stmt->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
    $stmt->bindValue(':photo', $_POST['photo']); // TODO save and get name of photo
    $stmt->bindValue(':pays', $_POST['pays']);
    $stmt->bindValue(':ville', $_POST['ville']);
    $stmt->bindValue(':adresse', $_POST['adresse']);
    $stmt->bindValue(':cp', $_POST['adresse']);
    $stmt->bindValue(':membre_id', $_POST['membre_id'], PDO::PARAM_INT);
    $stmt->bindValue(':categorie_id', $_POST['categorie_id'], PDO::PARAM_INT);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);
    if (!$stmt->execute()) {
        $alerts[ALERT_ERROR][] = 'Something went wrong while updating annonce.';
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Annonce</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('annonce_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
