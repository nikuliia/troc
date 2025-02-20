<?php
/**
 * @var array{
 *       titre: string,
 *       motscles: string,
 *  }|null $item
 */
?>
<div class="form-floating mb-3">
    <input type="text" name="titre" value="<?= $_POST['titre'] ?? $item['titre'] ?? '' ?>" class="form-control" id="id-titre" placeholder="Category name">
    <label for="id-titre">Category title</label>
</div>
<div class="form-floating mb-3">
    <input type="text" name="motscles" value="<?= $_POST['motscles'] ?? $item['motscles'] ?? '' ?>" class="form-control" id="id-motscles" placeholder="Keywords">
    <label for="id-motscles">Keywords</label>
</div>
<button class="btn btn-outline-success">Save</button>
