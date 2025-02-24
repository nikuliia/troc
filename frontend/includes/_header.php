<?php require_once('../common/categories/crud.php') ?>
<?php
/** @var PDO $pdo */
$categories = categoriesWithExistingAnnouncements($pdo);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="<?= 'http://localhost/assets/favicon.svg' ?>" type="assets/svg+xml">
    <title>TROC</title>
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!--header-->

<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
<!-- We dynamically list categories that contain at least one announcement -->
            <?php if (!empty($categories)) { ?>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= URL_FRONTEND, 'index.php' ?>" class="nav-link px-2">Main</a></li>
                    <?php foreach ($categories as $category) { ?>
                        <li>
                            <a href="<?= URL_FRONTEND, 'index.php?', http_build_query(['id_categorie' => $category['id_categorie']]) ?>"
                               class="nav-link px-2"><?= $category['titre'] ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
<!-- Dashboard Link is available for Admin Users only -->
            <?php if (userConnectedAdmin()) { ?>
                <div class="text-end me-2">
                    <a title="You admin!" href="<?= URL_ADMIN, 'dashboard/index.php' ?>"
                       class="btn btn-outline-primary px-2">Dashboard</a>
                </div>
            <?php } ?>
            <div class="dropdown text-end">
<!-- Dropdown Menu for Logged-In Users -->
                <?php if (userConnected()) { ?>
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                       data-bs-toggle="dropdown" aria-expanded="false">
<!-- Shows a profile picture if a user is connected or an admin icon if admin is connected -->
                        <?php if (userConnectedAdmin()) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        <?php } else { ?>
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                 class="rounded-circle">
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="<?= URL_FRONTEND, 'own-announce-add.php' ?>">Add
                                annonce...</a></li>
                        <li><a class="dropdown-item" href="<?= URL_FRONTEND, 'own-announces.php' ?>">My announcements</a>
                        </li>
                        <li><a class="dropdown-item" href="<?= URL_FRONTEND, 'profile.php' ?>">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= URL_FRONTEND, 'logout.php' ?>">Sign out</a></li>
                    </ul>
                <?php } else { ?>
                    <a href="<?= URL_FRONTEND, 'login.php' ?>" class="nav-link px-2">Login</a>
                <?php } ?>

            </div>
        </div>
    </div>
</header>