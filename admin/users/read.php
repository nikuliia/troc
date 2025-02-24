<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/user/crud.php') ?>

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

// view the existing user data
$item = userById((int)$_GET['id'], $pdo);
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Annonce #<?= $item['id_membre'] ?></h1>
</div>
<?php if ($item) { ?>
    <div class="card">
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

