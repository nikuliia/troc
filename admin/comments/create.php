<?php require_once('../core/init.php') ?>
<?php require_once('../../common/comments/crud.php') ?>


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
if (!empty($_POST) && isValid($_POST)) {
    // validate item

    if (createComment($_POST, $pdo)) {
        alertSuccess('Comment successfully created.');
        header('location: index.php');
        exit();
    }
    alertError('Something went wrong while updating comments.');
}
    // TODO add validation
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new comment</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <?php require_once('../comments/inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
