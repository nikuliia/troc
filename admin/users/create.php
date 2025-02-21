<?php require_once('../../common/core/init.php') ?>
<?php require_once('../../common/user/crud.php') ?>
<?php require_once('../../common/user/validation.php') ?>
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
if (!empty($_POST) && isValid($_POST)) {
    if (createUser($_POST, $pdo)) {
        alertSuccess('User successfully created.');
        header('location: index.php');
        exit();
    }
    alertError('Something went wrong while updating user information.');
}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a New User</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
