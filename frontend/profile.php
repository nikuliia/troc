<?php
require_once('../common/core/init.php');
require_once('../common/user/crud.php');
require_once('../common/user/validation.php');
require_once('../common/rating/crud.php');

/** @var PDO $pdo */

// Profile updating
if(!userConnected()){
    header('location:login.php');
    exit();
}

$item = userById(userId(), $pdo);
if (!empty($_POST)) {
    $data = $_POST;
    $data['id_membre'] = $item['id_membre'];
    $data['email'] = $item['email'];
    $data['statut'] = $item['statut'];
    if (isValid($data, false) && updateUser($data, $pdo)) {
        $item = userById(userId(), $pdo);
        alertSuccess('Profile updated successfully');
    }
}
$ratings = ratingList($pdo, ["membre_id2 = {$item['id_membre']}"]);
require_once('includes/_header.php');
?>
<main>
    <div class="container">
        <?php require_once('../_alerts.php') ?>
        <div class="row row-cols-1">
            <div class="col d-flex justify-content-between">
                <h1>Profile</h1>
                <div class="text-end">
                    <a class="btn btn-outline-primary" href="<?= 'own-announces.php' ?>">My announcements</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form method="post">
                    <?php require_once('includes/profile-inputs.php') ?>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="col">
                    <h1>My rating</h1>
                </div>
                <div class="col">
                    <?php foreach ($ratings as $rating) { ?>
                        <p>
                            <?= $rating['date_enregistrement'] ?>
                            <?= implode('', array_map(
                                static fn() => '⭑',
                                range(1, $rating['note']))) ?><br>
                            <?= $rating['avis'] ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/_footer.php');