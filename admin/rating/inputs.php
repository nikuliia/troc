<?php
/**
 * @var array{
 *       id_note: int,
 *        membre_id1: int,
 *        membre_id2: int,
 *        note: int,
 *        avis: string,
 *        date_enregistrement: string,
 *  }|null $item
* ?? '' */
?>
<div class="form-floating mb-3">
    <input type="text" name="membre_id1" value="<?= $item['membre_id1'] ?? '' ?>" class="form-control" id="id-User ID1" placeholder="User ID1">
    <label for="id-User ID1">User ID1</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="membre_id2" value="<?= $item['membre_id2'] ?? '' ?>" class="form-control" id="id-User ID2" placeholder="User ID2">
    <label for="id-User ID2">User ID2</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="note" value="<?= $item['note'] ?? '' ?>" class="form-control" id="id-rating" placeholder="Rating">
    <label for="id-rating">Rating</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="avis" value="<?= $item['avis'] ?? '' ?>" class="form-control" id="id-review" placeholder="Review">
    <label for="id-review">Review</label>
</div>
<!--<div class="form-floating mb-3">-->
<!--    <input type="date" name="date_enregistrement" value="--><?php //= $item['date_enregistrement'] ?? '' ?><!--" class="form-control" id="id-registrationDate" placeholder="Registration Date">-->
<!--    <label for="id-registrationDate"></label>-->
<!--</div>-->
<button class="btn btn-outline-success">Save</button>
