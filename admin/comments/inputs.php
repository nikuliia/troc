<?php require_once('../../common/user/list.php') ?>
<?php require_once('../../common/announcement/list.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array{
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *  }|null $item
 */
?>
<div class="form-floating mb-3">
    <select class="form-select" name="membre_id" id="id-membre_id">
        <?php foreach (getUserListForSelector($pdo) as $id => $title) { ?>
            <option value="<?= $id ?>"<?= $id === ($_POST['membre_id'] ?? $item['membre_id'] ?? '') ? ' selected' : '' ?>><?= $title ?></option>
        <?php } ?>
    </select>
    <label for="id-membre_id">User</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="annonce_id" id="id-annonce_id">
        <?php foreach (getAnounceListForSelector($pdo) as $id => $title) { ?>
            <option value="<?= $id ?>" <?= $id === ($_POST['annonce_id'] ?? $item['annonce_id'] ?? '') ? ' selected' : '' ?>><?= $title ?></option>
        <?php } ?>
    </select>
    <label for="id-annonce_id">Annonce</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="commentaire" value="<?= $_POST['commentaire'] ?? $item['commentaire'] ?? '' ?>" class="form-control" id="id-commentaire" placeholder="commentaire">
    <label for="id-commentaire">Comment</label>
</div>
<!--<div class="form-floating mb-3">-->
<!--    <input type="date" name="date_enregistrement" value="--><?php //= $item['date_enregistrement'] ?? '' ?><!--" class="form-control" id="id-date_enregistrement" placeholder="date_enregistrement">-->
<!--    <label for="id-date_enregistrement"></label>-->
<!--</div>-->
<button class="btn btn-outline-success">Save</button>
