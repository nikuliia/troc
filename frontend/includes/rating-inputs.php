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
    <input type="number" min="1" max="5" name="note" value="<?= $_POST['note'] ?? $item['note'] ?? '5' ?>" class="form-control" id="id-rating" placeholder="Rating">
    <label for="id-rating">Rating (note)</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="avis" value="<?= $_POST['avis'] ?? $item['avis'] ?? '' ?>" class="form-control" id="id-review" placeholder="Review">
    <label for="id-review">Review (avis)</label>
</div>
<button class="btn btn-outline-success">Save</button>
