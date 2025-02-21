<?php require_once('../../common/categories/list.php') ?>
<?php require_once('../../common/user/list.php') ?>
<?php
/**
 * @var PDO $pdo
 * @var array{
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
    <input name="titre" type="text" value="<?= $_POST['titre'] ?? $item['titre'] ?? '' ?>" class="form-control" id="id-titre" placeholder="titre">
    <label for="id-titre">Title</label>
</div>
<div class="form-floating mb-3">
    <input name="description_courte" type="text" value="<?= $_POST['description_courte'] ?? $item['description_courte'] ?? '' ?>" class="form-control" id="id-description_courte" placeholder="description_courte">
    <label for="id-description_courte">Short desc</label>
</div>
<div class="form-floating mb-3">
    <textarea class="form-control" style="resize: none;" name="description_longue" id="id-description_longue" rows="4"><?= $_POST['description_longue'] ?? $item['description_longue'] ?? '' ?></textarea>
    <label for="id-description_longue">Longue desc</label>
</div>
<div class="form-floating mb-3">
    <input name="prix" type="text" value="<?= $_POST['prix'] ?? $item['prix'] ?? '' ?>" class="form-control" id="id-prix" placeholder="prix">
    <label for="id-prix">Price</label>
</div>
<div class="mb-3">
    <label for="id-photo" class="form-label">Photo</label>
    <input accept=".jpg, .png, .svg, .bmp, .webp" class="form-control" name="photo" type="file" id="id-photo">
    <?php if (isset($item['photo'])) { ?>
        <img class="img-thumbnail w-50" src="<?= FILES_URL, '/announcement/', $item['photo'] ?>" alt="">
    <?php } ?>
</div>
<div class="form-floating mb-3">
    <input name="pays" type="text" value="<?= $_POST['pays'] ?? $item['pays'] ?? '' ?>" class="form-control" id="id-pays" placeholder="pays">
    <label for="id-pays">Country</label>
</div>
<div class="form-floating mb-3">
    <input name="ville" type="text" value="<?= $_POST['ville'] ?? $item['ville'] ?? '' ?>" class="form-control" id="id-ville" placeholder="ville">
    <label for="id-ville">City</label>
</div>
<div class="form-floating mb-3">
    <input name="adresse" type="text" value="<?= $_POST['adresse'] ?? $item['adresse'] ?? '' ?>" class="form-control" id="id-adresse" placeholder="adresse">
    <label for="id-adresse">Address</label>
</div>
<div class="form-floating mb-3">
    <input name="cp" type="text" value="<?= $_POST['cp'] ?? $item['cp'] ?? '' ?>" class="form-control" id="id-cp" placeholder="cp">
    <label for="id-cp">Zip</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="membre_id" id="id-membre_id">
        <?php foreach (getUserListForSelector($pdo) as $id => $title) { ?>
            <option value="<?= $id ?>"
                <?= $id === ($_POST['membre_id'] ?? $item['membre_id'] ?? '') ? ' selected' : ''?>>
                <?= $title ?>
            </option>
        <?php } ?>
    </select>
    <label for="id-membre_id">User</label>
</div>
<div class="form-floating mb-3">
    <select class="form-select" name="categorie_id" id="id-categorie_id">
        <?php foreach (getListForSelector($pdo) as $id => $title) { ?>
            <option value="<?= $id ?>"
                <?= $id === ($_POST['categorie_id'] ?? $item['categorie_id'] ?? '') ? ' selected' : ''?>>
                <?= $title ?>
            </option>
        <?php } ?>
    </select>
    <label for="id-categorie_id">Category</label>
</div>
<button class="btn btn-outline-success">Save</button>
