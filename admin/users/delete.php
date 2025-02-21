<?php require_once('../../common/core/init.php') ?>

    <!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<?php
/** @var PDO $pdo */

$success = $pdo->query("DELETE FROM troc.membre WHERE id_membre = '{$_GET['id']}'");
if (!$success) {
    alertError('Something went wrong while trying to delete a rating.');
}
?>
    <h2>Delete Rating</h2>

    <!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>