<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php require_once('../common/comments/crud.php') ?>
<?php require_once('../common/comments/validation.php') ?>
<?php
/**
 * @var PDO $pdo
 */
if (empty($_GET['id_annonce'])) {
    header('Location: index.php');
    exit();
}
$announcement = announcementById((int)$_GET['id_annonce'], $pdo);
if (empty($announcement)) {
    alertError('Announcement is not found');
    header('Location: index.php');
    exit();
}
if (!empty($_POST)) {
    $data = $_POST;
    $data['membre_id'] = userId();
    $data['annonce_id'] = $announcement['id_annonce'];
    if (isValid($data) && createComment($data, $pdo)) {
        alertSuccess('Comment successfully created');
    }
}
$comments = commentList($pdo, ['annonce_id' => $announcement['id_annonce']]);
?>
<?php require_once('includes/_header.php') ?>
<?php require_once('../_alerts.php') ?>
<div class="container">
    <div class="card shadow-sm">
        <img
            src="<?= FILES_URL, 'announcement/', $announcement['photo'] ?>"
            alt="<?= $announcement['description_courte'] ?>"
            class="bd-placeholder-img card-img-top w-25">
        <div class="card-body">
            <p class="card-text"><?= $announcement['titre'] ?></p>
            <p class="card-text"><?= $announcement['description_longue'] ?></p>
            <div class="d-flex justify-content-between">
                <small class="text-body-secondary"><?= date('Y-m-d', strtotime($announcement['date_enregistrement'])) ?></small>
                <a href="leave-review.php?<?= http_build_query(['id_annonce' => $announcement['id_annonce']]) ?>" class="btn btn-warning">Leave a review</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>Comments</h2>
    <?php if (userConnected()) { ?>
        <div class="accordion mb-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Leave a comment
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="post">
                            <div class="form-floating">
                                <textarea name="commentaire" class="form-control" placeholder="Leave a comment here" id="floatingTextarea-commentaire"></textarea>
                                <label for="floatingTextarea-commentaire">Comments</label>
                            </div>
                            <button class="btn btn-outline-success w-100" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php foreach ($comments as $comment) { ?>
        <div class="card">
            <div class="card-body">
                <p><?= $comment['commentaire'] ?></p>
            </div>
        </div>
    <?php } ?>
</div>
<?php require_once('includes/_footer.php') ?>

