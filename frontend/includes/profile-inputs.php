<?php
/**
 * @var array{
 *       id_membre: int,
 *        pseudo: string,
 *        mdp: string,
 *        nom: string,
 *        prenom: string,
 *        telephone: int,
 *        email: string,
 *        civilite: string,
 *        statut: int,
 *        date_enregistrement: string,
 *  }|null $item
 */
?>

<!-- A form section for user details. -->
<!--It dynamically populates fields with previously entered values (from $_POST) or existing database records ($item)-->
<div class="form-floating mb-3">
    <input type="text" name="pseudo" value="<?= $_POST['pseudo'] ?? $item['pseudo'] ?? '' ?>" class="form-control" id="id-pseudo" placeholder="nickname">
    <label for="id-pseudo">Nickname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="nom" value="<?= $_POST['nom'] ?? $item['nom'] ?? '' ?>" class="form-control" id="id-nom" placeholder="name">
    <label for="id-nom">Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="prenom" value="<?= $_POST['prenom'] ?? $item['prenom'] ?? '' ?>" class="form-control" id="id-prenom" placeholder="surname">
    <label for="id-prenom">Surname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="telephone" value="<?= $_POST['telephone'] ?? $item['telephone'] ?? '' ?>" class="form-control" id="id-telephone" placeholder="phone number">
    <label for="id-telephone">Phone number</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="civilite" id="id-civilite">
        <option value="m"<?= isset($item) && $item['civilite'] == 'm' ? ' selected' : '' ?>>Male</option>
        <option value="f"<?= isset($item) && $item['civilite'] == 'f' ? ' selected' : '' ?>>Female</option>
    </select>
    <label for="id-civilite">Sex</label>
</div>
<button class="btn btn-outline-success">Save</button>
