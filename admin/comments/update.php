<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/comments/crud.php') ?>
<?php require_once('../../common/comments/validation.php') ?>
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

// comments update
$item = commentById((int)$_GET['id'], $pdo);
if (is_null($item)) {
    alertError('Does not exist.');
    header('Location: index.php');
    exit();
}
if (!empty($_POST) && isValid($_POST)) {
    $data = $_POST;
    $data['id_commentaire'] = (int)$_GET['id'];
    if (updateComment($data, $pdo)) {
        alertSuccess('Comment successfully updated');
        header('Location: index.php');
        exit();
    }
    // error alert
    alertError('Something went wrong while updating a comment.');

}
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comment Update</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
