<?php /** @var array<string, array<string>> $alerts */ ?>
<!--            Alerts start -->
<?php foreach ($alerts as $type => $messages) { ?>
<div class="alert alert-<?= $type ?>" role="alert"><?= implode('<br>', $messages) ?></div>
<?php } ?>
<!--            Alerts end -->