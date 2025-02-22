<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/categories/crud.php') ?>
<?php require_once('../../common/categories/validation.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array{
 *       id_categorie: int,
 *       titre: string,
 *       motscles: string,
 *  }|null $item
 */
$item = categoryById((int)$_GET['id'], $pdo);

if (is_null($item)) {
    alertError('Category not found.');
    header('location: index.php');
    exit();
}

if (!empty($_POST) && isValid($_POST)) {

    $data = $_POST;
    $data['id_categorie'] = (int)$_GET['id'];
    if (updateCategory($data, $pdo)) {
        alertSuccess('Category successfully updated.');
        header('Location: index.php');
        exit();
    }
    alertError('Something went wrong while updating category.');
}
?>
<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update a category</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <?php require_once('inputs.php') ?>
</form>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
