<?php require_once('core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<string, string> $alerts
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

$items = $pdo->query(" SELECT * FROM troc.annonce ORDER BY id_annonce DESC", PDO::FETCH_ASSOC);
?>
<!--Место для кода-->

<?php require_once('includes/_header.php') ?>
<?php require_once('includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Annonce</h1>
    <a class="btn btn-success" href="annonce_create.php">Add</a>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">titre</th>
            <th scope="col">description_courte</th>
            <th scope="col">description_longue</th>
            <th scope="col">prix</th>
            <th scope="col">photo</th>
            <th scope="col">pays</th>
            <th scope="col">ville</th>
            <th scope="col">adresse</th>
            <th scope="col">cp</th>
            <th scope="col">membre_id</th>
            <th scope="col">categorie_id</th>
            <th scope="col">date_enregistrement</th>
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
                    <a class="text-decoration-none" href="<?= URL, 'annonce_read.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
                        <svg class="bi text-secondary"><use xlink:href="#eye-fill"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= URL, 'annonce_update.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
                        <svg class="bi text-primary"><use xlink:href="#pencil-square"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= URL, 'annonce_delete.php?', http_build_query(['id' => $item['id_annonce']]) ?>">
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
<?php require_once('includes/_footer.php'); ?>
