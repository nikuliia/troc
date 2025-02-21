<?php /** @var array<string, array<string>> $alerts */
$alerts = $_SESSION['alerts'] ?? [];
foreach ($alerts as $type => $messages) { ?>
<div class="alert alert-<?= $type ?>" role="alert"><?= implode('<br>', $messages) ?></div>
<?php alertClean($type) ?>
<?php } ?>
<!--            Alerts end -->