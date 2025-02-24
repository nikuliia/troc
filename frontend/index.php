<?php require_once('../common/core/init.php') ?>
<?php require_once('includes/_header.php') ?>
<?php require_once('../common/announcement/crud.php') ?>
<?php
/** @var PDO $pdo */

// Handling Category Filtering: checks if a category filter (id_categorie) is applied via GET request.
// Converts it to an integer ((int)$_GET['id_categorie']) to prevent SQL injection.
// Adds it to the $where conditions array.
$where = [];
if (!empty($_GET['id_categorie'])) {
    $id = (int)$_GET['id_categorie'];
    $where[] = "categorie_id = $id";
}

// Fetching announcement data
$total = announcementCount($pdo, $where); // Counts total number of matching announcements.
$announcements = announcementList($pdo, $where, pagination: pagination($total)); // Retrieves a paginated list of announcements to limit results per page
?>
<?php require_once('../_alerts.php') ?>

    <!-- Displaying Announcements in a Grid Layout -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Loops through announcements and displays an image from a predefined FILES_URL/announcement/ directory. -->
                <?php foreach ($announcements as $announcement) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= FILES_URL, 'announcement/', $announcement['photo'] ?>"
                                 alt="<?= $announcement['description_courte'] ?>"
                                 class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <p class="card-text"><?= $announcement['titre'] ?></p>
                                <p class="card-text"><?= $announcement['prix'] ?> €</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?= 'view-announcement.php?', http_build_query(['id_annonce' => $announcement['id_annonce']]) ?>"
                                           class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-body-secondary"><?= date('Y-m-d', strtotime($announcement['date_enregistrement'])) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- pagination controls -->
                    <?php require_once('../_pagination.php') ?>
                </div>
            </div>
        </div>
    </div>
<?php require_once('includes/_footer.php') ?>