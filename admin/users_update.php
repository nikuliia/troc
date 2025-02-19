<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_membre: int,
 *       pseudo: string,
 *       mdp: string,
 *       nom: string,
 *       prenom: string,
 *       telephone: int,
 *       email: string,
 *       civilite: string,
 *       statut: int,
 *       date_enregistrement: string,
 *  }|null $item
 */
$stmt = $pdo->query(sprintf("SELECT id_membre, pseudo, mdp, nom, prenom, telephone, email, civilite, statut, date_enregistrement FROM troc.membre WHERE id_membre = %d", (int)$_GET['id']));

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    $item = null;
}
if (!empty($_POST)) {
    // validate item

    // TODO add validation

    // save item
    $stmt = $pdo->prepare("UPDATE troc.membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, civilite = :civilite, statut = :statut, date_enregistrement = :date_enregistrement  WHERE id_membre = :id_membre ");
    $stmt->bindValue(':pseudo', $_POST['pseudo']);
    $stmt->bindValue(':mdp', $_POST['mdp']);
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':prenom', $_POST['prenom']);
    $stmt->bindValue(':telephone', $_POST['telephone']); // TODO save and get name of photo
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':civilite', $_POST['civilite']);
    $stmt->bindValue(':statut', $_POST['statut'], PDO::PARAM_INT);
    $stmt->bindValue(':date_enregistrement', $_POST['date_enregistrement']);

    if (!$stmt->execute()) {
        alertError('Something went wrong while updating annonce.');
    }
}
?>

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update User</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('membre_inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
