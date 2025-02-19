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
    <input type="text" value="<?= $item['membre_id'] ?? '' ?>" class="form-control" id="id-membre_id" placeholder="membre_id">
    <label for="id-titre">User ID</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['annonce_id'] ?? '' ?>" class="form-control" id="id-annonce_id" placeholder="annonce_id">
    <label for="id-description_courte">Listing ID</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['commentaire'] ?? '' ?>" class="form-control" id="id-commentaire" placeholder="commentaire">
    <label for="id-description_longue">Comment</label>
</div>
<div class="form-floating mb-3">
    <input type="date" value="<?= $item['date_enregistrement'] ?? '' ?>" class="form-control" id="id-date_enregistrement" placeholder="date_enregistrement">
    <label for="id-date_enregistrement"></label>
</div>
<button class="btn btn-outline-success">Save</button>
