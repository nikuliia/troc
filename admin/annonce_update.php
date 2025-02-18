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
$stmt = $pdo->query(sprintf("SELECT id_annonce, titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp, membre_id, categorie_id, date_enregistrement FROM troc.annonce WHERE id_annonce = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("UPDATE troc.annonce SET titre = :titre, description_courte = :description_courte, description_longue = :description_longue, prix = :prix, photo = :photo, pays = :pays, ville = :ville, adresse = :adresse, cp = :cp, membre_id = :membre_id, categorie_id = :categorie_id, date_enregistrement = :date_enregistrement  WHERE membre_id = :membre_id ");
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
    <h1 class="h2">Update Annonce</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('annonce_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
