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
<div class="form-floating mb-3">
    <input type="text" name="pseudo" value="<?= $item['pseudo'] ?? '' ?>" class="form-control" id="id-pseudo" placeholder="nickname">
    <label for="id-pseudo">Nickname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="nom" value="<?= $item['nom'] ?? '' ?>" class="form-control" id="id-nom" placeholder="name">
    <label for="id-nom">Name</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="prenom" value="<?= $item['prenom'] ?? '' ?>" class="form-control" id="id-prenom" placeholder="surname">
    <label for="id-prenom">Surname</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="telephone" value="<?= $item['telephone'] ?? '' ?>" class="form-control" id="id-telephone" placeholder="phone number">
    <label for="id-telephone">Phone number</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="email" value="<?= $item['email'] ?? '' ?>" class="form-control" id="id-email" placeholder="email">
    <label for="id-email">Email</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="civilite" id="id-civilite">
        <option value="m"<?= isset($item) && $item['civilite'] == 'm' ? ' checked' : '' ?>>Male</option>
        <option value="f"<?= isset($item) && $item['civilite'] == 'f' ? ' checked' : '' ?>>Female</option>
    </select>
    <label for="id-civilite">Sex</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="statut" id="id-statut">
        <option value="0"<?= isset($item) && $item['statut'] == 0 ? ' checked' : '' ?>>User</option>
        <option value="1"<?= isset($item) && $item['statut'] == 1 ? ' checked' : '' ?>>Admin</option>
    </select>
    <label for="id-statut">Status</label>
</div>
<button class="btn btn-outline-success">Save</button>
