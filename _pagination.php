<?php
/**
 * @var int $page
 * @var int $total
 */
if (!isset($total)) {
    throw new Exception('$page or $total or $perPage must be set');
}
$page = currentPage();
$pages = (int)ceil($total / PER_PAGE);
$firstPage = 1;
$lastPage = $pages;
?>
<?php if ($pages > 1) { ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item<?= $page == $firstPage ? ' disabled' : '' ?>">
                <a class="page-link" href="?<?= pageQuery($page - 1) ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item<?= $i == $page ? ' active' : '' ?>">
                    <a class="page-link" href="?<?= pageQuery($i) ?>"><?= $i ?></a>
                </li>
            <?php } ?>
            <li class="page-item<?= $page == $lastPage ? ' disabled' : '' ?>"><a class="page-link" href="?<?= pageQuery($page + 1) ?>">Next</a></li>
        </ul>
    </nav>
<?php } ?>
