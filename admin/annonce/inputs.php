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
    <input name="titre" type="text" value="<?= $item['titre'] ?? $_POST['titre'] ?? '' ?>" class="form-control" id="id-titre" placeholder="titre">
    <label for="id-titre">titre</label>
</div>
<div class="form-floating mb-3">
    <input name="description_courte" type="text" value="<?= $item['description_courte'] ?? $_POST['description_courte'] ?? '' ?>" class="form-control" id="id-description_courte" placeholder="description_courte">
    <label for="id-description_courte">description_courte</label>
</div>
<div class="form-floating mb-3">
    <input name="description_longue" type="text" value="<?= $item['description_longue'] ?? $_POST['description_longue'] ?? '' ?>" class="form-control" id="id-description_longue" placeholder="description_longue">
    <label for="id-description_longue">description_longue</label>
</div>
<div class="form-floating mb-3">
    <input name="prix" type="text" value="<?= $item['prix'] ?? $_POST['prix'] ?? '' ?>" class="form-control" id="id-prix" placeholder="prix">
    <label for="id-prix">prix</label>
</div>
<div class="form-floating mb-3">
    <input name="photo" type="text" value="<?= $item['photo'] ?? $_POST['photo'] ?? '' ?>" class="form-control" id="id-photo" placeholder="photo">
    <label for="id-photo">photo</label>
</div>
<div class="form-floating mb-3">
    <input name="pays" type="text" value="<?= $item['pays'] ?? $_POST['pays'] ?? '' ?>" class="form-control" id="id-pays" placeholder="pays">
    <label for="id-pays">pays</label>
</div>
<div class="form-floating mb-3">
    <input name="ville" type="text" value="<?= $item['ville'] ?? $_POST['ville'] ?? '' ?>" class="form-control" id="id-ville" placeholder="ville">
    <label for="id-ville">ville</label>
</div>
<div class="form-floating mb-3">
    <input name="adresse" type="text" value="<?= $item['adresse'] ?? $_POST['adresse'] ?? '' ?>" class="form-control" id="id-adresse" placeholder="adresse">
    <label for="id-adresse">adresse</label>
</div>
<div class="form-floating mb-3">
    <input name="cp" type="text" value="<?= $item['cp'] ?? $_POST['cp'] ?? '' ?>" class="form-control" id="id-cp" placeholder="cp">
    <label for="id-cp">cp</label>
</div>
<div class="form-floating mb-3">
    <input name="membre_id" type="text" value="<?= $item['membre_id'] ?? $_POST['membre_id'] ?? '' ?>" class="form-control" id="id-membre_id" placeholder="membre_id">
    <label for="id-membre_id">membre_id</label>
</div>
<div class="form-floating mb-3">
    <input name="categorie_id" type="text" value="<?= $item['categorie_id'] ?? $_POST['categorie_id'] ?? '' ?>" class="form-control" id="id-categorie_id" placeholder="categorie_id">
    <label for="id-categorie_id">categorie_id</label>
</div>
<button class="btn btn-outline-success">Save</button>
