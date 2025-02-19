<?php
/**
 * @var array{
 *       id_annonce: int,
 *       titre: string,
 *       description_courte: string,
 *       description_longue: string,
 *       prix: int,
 *       photo: string,
 *       pays: string,
 *       ville: string,
 *       adresse: string,
 *       cp: int,
 *       membre_id: int,
 *       categorie_id: int,
 *       date_enregistrement: string,
 *  }|null $item
?? '' */
?>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['membre_id1'] ?? '' ?>" class="form-control" id="id-User ID1" placeholder="User ID1">
    <label for="id-User ID1">User ID1</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['membre_id2'] ?? '' ?>" class="form-control" id="id-User ID2" placeholder="User ID2">
    <label for="id-User ID2">User ID2</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['note'] ?? '' ?>" class="form-control" id="id-rating" placeholder="Rating">
    <label for="id-rating">Rating</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['avis'] ?? '' ?>" class="form-control" id="id-review" placeholder="Review">
    <label for="id-review">Review</label>
</div>
<div class="form-floating mb-3">
    <input type="date" value="<?= $item['date_enregistrement'] ?? '' ?>" class="form-control" id="id-registrationDate" placeholder="Registration Date">
    <label for="id-registrationDate"></label>
</div>
<button class="btn btn-outline-success">Save</button>
