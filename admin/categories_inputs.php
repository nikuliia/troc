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
    <input type="text" value="<?= $item['titre'] ?? '' ?>" class="form-control" id="id-titre" placeholder="titre">
    <label for="id-titre">Categorie name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['motcles'] ?? '' ?>" class="form-control" id="id-motcles" placeholder="motcles">
    <label for="id-description_courte">Keywords</label>
</div>
<button class="btn btn-outline-success">Save</button>
