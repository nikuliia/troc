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
    <input type="text" value="<?= $item['pseudo'] ?? '' ?>" class="form-control" id="id-pseudo" placeholder="nickname">
    <label for="id-pseudo">Nickname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['mdp'] ?? '' ?>" class="form-control" id="id-mdp" placeholder="password">
    <label for="id-mdp">Password</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['nom'] ?? '' ?>" class="form-control" id="id-nom" placeholder="name">
    <label for="id-nom">Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['prenom'] ?? '' ?>" class="form-control" id="id-prenom" placeholder="surname">
    <label for="id-prenom">Surname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['telephone'] ?? '' ?>" class="form-control" id="id-telephone" placeholder="phone number">
    <label for="id-telephone">Phone number</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['email'] ?? '' ?>" class="form-control" id="id-email" placeholder="email">
    <label for="id-email">Email</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['civilite'] ?? '' ?>" class="form-control" id="id-civilite" placeholder="sex">
    <label for="id-civilite">Sex</label>
</div>
<div class="form-floating mb-3">
    <input type="text" value="<?= $item['statut'] ?? '' ?>" class="form-control" id="id-statut" placeholder="status">
    <label for="id-statut">Status</label>
</div>
<div class="form-floating mb-3">
    <input type="date" value="<?= $item['date_enregistrement'] ?? '' ?>" class="form-control" id="id-date_enregistrement">
    <label for="id-date_enregistrement">Registration Date</label>
</div>
<button class="btn btn-outline-success">Save</button>
