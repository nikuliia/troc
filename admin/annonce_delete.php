<?php require_once('core/init.php') ?>

<!--Место для кода-->

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<?php
/** @var PDO $pdo */

$success = $pdo->query("DELETE FROM troc.annonce WHERE id_annonce = '{$_GET['id']}'");
if (!$success) {
    $alerts[ALERT_ERROR][] = 'Something went wrong while trying to delete the annonce.';
}
?>
<h2>Delete Annonce</h2>

<!--            Content end -->
<?php require_once('includes/_footer.php'); ?>
