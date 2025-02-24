<?php require_once('../../common/core/init.php') ?>
<?php require_once('../../common/user/list.php') ?>
<?php require_once('../../common/announcement/list.php') ?>
<?php require_once('../../common/categories/list.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php
/** @var PDO $pdo */

// statistics
$topUsersByAvgRating = topUsersByAvgRating($pdo, limit: 5);
$topUsersByCountAnnonce = topUsersByCountAnnonce($pdo, limit: 5);
$topOldestAnnouncements = topOldestAnnouncements($pdo, limit: 5);
$topCategoriesByCountAnnonce = topCategoriesByCountAnnonce($pdo, limit: 5);
?>
<?php require_once('../includes/_header.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="row row-cols-2 g-3">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Top users by average rating</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php foreach ($topUsersByAvgRating as $item) { ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $item['nom'] ?>
                            <span class="badge text-bg-primary"><?= round((float)$item['avgNote'], 1) ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Top users by count annonce</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php foreach ($topUsersByCountAnnonce as $item) { ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $item['nom'] ?>
                            <span class="badge text-bg-primary"><?= $item['countAnnonce'] ?? 0 ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Top oldest announcements</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php foreach ($topOldestAnnouncements as $item) { ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $item['titre'] ?>
                            <span class="badge text-bg-primary"><?= $item['date_enregistrement'] ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Top oldest announcements</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php foreach ($topCategoriesByCountAnnonce as $item) { ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <?= $item['titre'] ?>
                            <span class="badge text-bg-primary"><?= $item['countAnnonce'] ?></span>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
