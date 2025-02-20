<?php require_once('../core/init.php') ?>
<?php require_once('../../common/categories/crud.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array<array{
 *      id_annonce: int,
 *      titre: string,
 *      description_courte: string,
 *      description_longue: string,
 *      prix: int,
 *      photo: string,
 *      pays: string,
 *      ville: string,
 *      adresse: string,
 *      cp: int,
 *      membre_id: int,
 *      categorie_id: int,
 *      date_enregistrement: string,
 * }> $items
 */

$items = categoryList($pdo);
?>
<!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
    <a class="btn btn-success" href="create.php">Add</a>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Category ID</th>
            <th scope="col">Title</th>
            <th scope="col">Keywords</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($items)) {
            echo '<tr><td class="text-center" colspan="4">There is no data yet.</td></tr>';
        }
        foreach ($items as $item) { ?>
            <tr>
                <?= '<tr>',
                "<td>{$item['id_categorie']}</td>",
                "<td>{$item['titre']}</td>",
                "<td>{$item['motscles']}</td>"
                ?>
                <td>
                    <?php $queryParams = http_build_query(['id' => $item['id_categorie']]) ?>
                    <a class="text-decoration-none"
                       href="<?= 'read.php?', $queryParams ?>">
                        <svg class="bi text-secondary">
                            <use xlink:href="#eye-fill"/>
                        </svg>
                    </a>
                    <a class="text-decoration-none"
                       href="<?= 'update.php?', $queryParams ?>">
                        <svg class="bi text-primary">
                            <use xlink:href="#pencil-square"/>
                        </svg>
                    </a>
                    <a class="text-decoration-none"
                       href="<?= 'delete.php?', $queryParams ?>">
                        <svg class="bi text-danger">
                            <use xlink:href="#trash"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
