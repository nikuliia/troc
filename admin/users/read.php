<?php require_once('../core/init.php') ?>

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
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Annonce #<?= $item['id_membre'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">ID: <?= $item['id_membre'] ?></h5>
            <p class="card-text">Nickname: <?= $item['pseudo'] ?></p>
            <p class="card-text">Password: <?= $item['mdp'] ?></p>
            <p class="card-text">Name: <?= $item['nom'] ?></p>
            <p class="card-text">Surname: <?= $item['prenom'] ?></p>
            <p class="card-text">Phone number: <?= $item['telephone'] ?></p>
            <p class="card-text">Email: <?= $item['email'] ?></p>
            <p class="card-text">Sex: <?= $item['civilite'] ?></p>
            <p class="card-text">Status: <?= $item['statut'] ?></p>
            <p class="card-text">date_enregistrement: <?= $item['date_enregistrement'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= 'update.php?', http_build_query(['id' => $item['id_membre']]) ?>" class="btn btn-primary w-100">Update</a>
        </div>
    </div>
<?php } ?>

<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>

