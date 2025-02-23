<?php require_once('../../common/core/init.php') ?>
<?php require_once('../../common/rating/crud.php') ?>
<?php require_once('../admin-rules.php') ?>

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
$total = ratingCount($pdo);
$items = ratingList($pdo, pagination: pagination($total));
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
                    <?php $query = http_build_query(['id' => $item['id_note']]) ?>
                    <a class="text-decoration-none" href="<?= 'read.php?', $query ?>">
                        <svg class="bi text-secondary"><use xlink:href="#eye-fill"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'delete.php?', $query ?>">
                        <svg class="bi text-danger"><use xlink:href="#trash"/></svg>
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
