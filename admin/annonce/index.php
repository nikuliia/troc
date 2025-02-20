<?php require_once('../core/init.php') ?>
<?php require_once('../../common/announcement/crud.php') ?>

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
$items = announcementList($pdo);
?>
<!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listing</h1>
    <a class="btn btn-success" href="create.php">Add</a>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Ad ID</th>
            <th scope="col">Title</th>
            <th scope="col">Short desc</th>
            <th scope="col">Longue desc</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Address</th>
            <th scope="col">Zip</th>
            <th scope="col">User ID</th>
            <th scope="col">Category ID</th>
            <th scope="col">Registration Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($items)) {
            echo '<tr><td class="text-center" colspan="14">There is no data yet.</td></tr>';
        }
        foreach ($items as $item) { ?>
            <tr>
                <?= '<tr>',
                "<td>{$item['id_annonce']}</td>",
                "<td>{$item['titre']}</td>",
                "<td>{$item['description_courte']}</td>",
                "<td>{$item['description_longue']}</td>",
                "<td>{$item['prix']}</td>",
                "<td>{$item['photo']}</td>",
                "<td>{$item['pays']}</td>",
                "<td>{$item['ville']}</td>",
                "<td>{$item['adresse']}</td>",
                "<td>{$item['cp']}</td>",
                "<td>{$item['membre_id']}</td>",
                "<td>{$item['categorie_id']}</td>",
                "<td>{$item['date_enregistrement']}</td>" ?>
                <td>
                    <a class="text-decoration-none" href="<?= 'read.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
                        <svg class="bi text-secondary"><use xlink:href="#eye-fill"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'update.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
                        <svg class="bi text-primary"><use xlink:href="#pencil-square"/></svg>
                    </a>
                    <a class="text-decoration-none" onclick="if (confirm('Delete selected item?')){return true;}else{window.event.stopPropagation(); window.event.preventDefault();}" href="<?= 'delete.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
                        <svg class="bi text-danger"><use xlink:href="#trash"/></svg>
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
