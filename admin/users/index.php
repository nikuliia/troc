<?php require_once('../core/init.php') ?>

<?php
/**
 * @var PDO $pdo
 * @var array<array{
 *      id_membre: int,
 *        pseudo: string,
 *        mdp: string,
 *        nom: string,
 *        prenom: string,
 *        telephone: int,
 *        email: string,
 *        civilite: string,
 *        statut: int,
 *        date_enregistrement: string,
 * }> $items
 */

$items = userList($pdo);
//$items = $pdo->query("SELECT * FROM troc.membre ORDER BY id_membre DESC", PDO::FETCH_ASSOC);
?>
<!--Место для кода-->

<?php require_once('../includes/_header.php') ?>
<?php require_once('../includes/_alerts.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
    <a class="btn btn-success" href="create.php">Add</a>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Nickname</th>
            <th scope="col">Password</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Phone #</th>
            <th scope="col">Email</th>
            <th scope="col">Sex</th>
            <th scope="col">Status</th>
            <th scope="col">Zip code</th>
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
                "<td>{$item['id_membre']}</td>",
                "<td>{$item['pseudo']}</td>",
                "<td>{$item['mdp']}</td>",
                "<td>{$item['nom']}</td>",
                "<td>{$item['prenom']}</td>",
                "<td>{$item['telephone']}</td>",
                "<td>{$item['email']}</td>",
                "<td>{$item['civilite']}</td>",
                "<td>{$item['statut']}</td>",
                "<td>{$item['cp']}</td>",
                "<td>{$item['date_enregistrement']}</td>" ?>
                <td>
                    <a class="text-decoration-none" href="<?= 'read.php?', http_build_query(['id' => $item['id_membre']]) ?>">
                        <svg class="bi text-secondary"><use xlink:href="#eye-fill"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'update.php?', http_build_query(['id' => $item['id_membre']]) ?>">
                        <svg class="bi text-primary"><use xlink:href="#pencil-square"/></svg>
                    </a>
                    <a class="text-decoration-none" href="<?= 'delete.php?', http_build_query(['id' => $item['id_membre']]) ?>">
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

