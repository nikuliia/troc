<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/user/crud.php') ?>
<?php require_once('../common/user/validation.php') ?>
<?php

/** @var PDO $pdo */

// registration page for new users
if (!empty($_POST) && isValid($_POST)) {
    $user = $_POST;
    if (createUser($_POST, $pdo)) {
        $user = userByEmail($_POST['email'], $pdo);
        alertSuccess('User successfully created.');
        $_SESSION['user'] = $user;
        header('location: profile.php');
        exit();
    }
    alertError('Something went wrong while updating user information.');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Registration</title>

    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../assets/sign-in.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
    <?php require_once('../_alerts.php') ?>
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please Register</h1>
        <div class="form-floating">
            <input name="pseudo" type="text" value="<?= $_POST['pseudo'] ?? '' ?>" class="form-control" id="floatingInput-pseudo" placeholder="pseudo">
            <label for="floatingInput-pseudo">pseudo</label>
        </div>
        <div class="form-floating">
            <input name="email" type="email" value="<?= $_POST['email'] ?? '' ?>" class="form-control" id="floatingInput-email" placeholder="email">
            <label for="floatingInput-email">email</label>
        </div>
        <div class="form-floating">
            <input name="mdp" type="password" value="<?= $_POST['mdp'] ?? '' ?>" class="form-control" id="floatingInput-mdp" placeholder="mdp">
            <label for="floatingInput-mdp">mdp</label>
        </div>
        <div class="form-floating">
            <input name="nom" type="text" value="<?= $_POST['nom'] ?? '' ?>" class="form-control" id="floatingInput-nom" placeholder="nom">
            <label for="floatingInput-nom">nom</label>
        </div>
        <div class="form-floating">
            <input name="prenom" type="text" value="<?= $_POST['prenom'] ?? '' ?>" class="form-control" id="floatingInput-prenom" placeholder="prenom">
            <label for="floatingInput-prenom">prenom</label>
        </div>
        <div class="form-floating">
            <input name="telephone" type="text" value="<?= $_POST['telephone'] ?? '' ?>" class="form-control" id="floatingInput-telephone" placeholder="telephone">
            <label for="floatingInput-telephone">telephone</label>
        </div>
        <div class="form-floating">
            <select class="form-select" name="civilite" id="id-civilite">
                <option value="m"<?= !empty($_POST) && $_POST['civilite'] == 'm' ? ' checked' : '' ?>>Male</option>
                <option value="f"<?= !empty($_POST) && $_POST['civilite'] == 'f' ? ' checked' : '' ?>>Female</option>
            </select>
            <label for="floatingInput-civilite">civilite</label>
        </div>
        <button class="btn btn-primary w-100" type="submit">Registration</button>
        <p class="mt-5 mb-3 text-body-secondary">Or <a href="login.php">login</a></p>
    </form>
</main>
<script src="../assets/bootstrap/bootstrap.min.js"></script>

</body>
</html>
