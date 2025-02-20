<?php
/**
 * @var array{
 *       id_commentaire: int,
 *       membre_id: int,
 *       annonce_id: int,
 *       commentaire: string,
 *       date_enregistrement: string,
 *  }|null $item
* ?? '' */
?>
<div class="form-floating mb-3">
    <input type="text" name="membre_id" value="<?= $item['membre_id'] ?? '' ?>" class="form-control" id="id-membre_id" placeholder="membre_id">
    <label for="id-membre_id">User ID</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="annonce_id" value="<?= $item['annonce_id'] ?? '' ?>" class="form-control" id="id-annonce_id" placeholder="annonce_id">
    <label for="id-annonce_id">Listing ID</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="commentaire" value="<?= $item['commentaire'] ?? '' ?>" class="form-control" id="id-commentaire" placeholder="commentaire">
    <label for="id-commentaire">Comment</label>
</div>
<!--<div class="form-floating mb-3">-->
<!--    <input type="date" name="date_enregistrement" value="--><?php //= $item['date_enregistrement'] ?? '' ?><!--" class="form-control" id="id-date_enregistrement" placeholder="date_enregistrement">-->
<!--    <label for="id-date_enregistrement"></label>-->
<!--</div>-->
<button class="btn btn-outline-success">Save</button>
