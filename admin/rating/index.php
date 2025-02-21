<?php require_once('../../common/core/init.php') ?>

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

$items = $pdo->query("SELECT * FROM troc.note ORDER BY id_note DESC", PDO::FETCH_ASSOC);
?>
<!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../../_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rating</h1>
    <a class="btn btn-success" href="create.php">Add</a>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Rating ID</th>
            <th scope="col">User ID_1</th>
            <th scope="col">User ID_2</th>
            <th scope="col">Rating</th>
            <th scope="col">Review</th>
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
                "<td>{$item['id_note']}</td>",
                "<td>{$item['membre_id1']}</td>",
                "<td>{$item['membre_id2']}</td>",
                "<td>{$item['note']}</td>",
                "<td>{$item['avis']}</td>",
                "<td>{$item['date_enregistrement']}</td>" ?>
                <td>
                    <a class="text-decoration-none" href="<?= 'read.php?', http_build_query(['id' => $item['id_rating']]) ?>">
                        <svg class="bi text-secondary"><use xlink:href="#eye-fill"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'update.php?', http_build_query(['id' => $item['id_rating']]) ?>">
                        <svg class="bi text-primary"><use xlink:href="#pencil-square"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'delete.php?', http_build_query(['id' => $item['id_rating']]) ?>">
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
