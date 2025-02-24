<?php require_once('../../common/core/init.php') ?>
<?php require_once('../admin-rules.php') ?>
<?php require_once('../../common/categories/crud.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array<array{
 *      id_categories: int,
 *      titre: string,
 *      motscles: string,
 * }> $items
 */

// categories page
$total = categoriesCount($pdo);
$items = categoryList($pdo, pagination: pagination($total));
?>

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
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
                    <a class="text-decoration-none" onclick="if (confirm('Delete selected item?')){return true;}else{window.event.stopPropagation(); window.event.preventDefault();};"
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
    <?php require_once('../../_pagination.php') ?>
</div>
<!--            Content end -->
<?php require_once('../includes/_footer.php'); ?>
