<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
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

// updating the existing user data
$item = userById((int)$_GET['id'], $pdo);

if (is_null($item)) {
    alertError('User not found.');
    header('location: index.php');
    exit();
}

if (!empty($_POST) && isValid($_POST, false)) {
    $data = $_POST;
    $data['id_membre'] = (int)$_GET['id'];
    if (updateUser($data, $pdo)) {
        alertSuccess('User successfully updated.');
        header('Location: index.php');
        exit();
    }
    alertError('Something went wrong while updating category.');
}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update User</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
