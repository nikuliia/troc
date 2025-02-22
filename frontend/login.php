<?php require_once('../common/core/init.php') ?>
<?php require_once('../common/user/crud.php') ?>
<?php require_once('../common/user/validation.php') ?>
<?php
/** @var PDO $pdo */
if (!empty($_POST) && isLoginValid($_POST)) {
    if (($user = userByEmail($_POST['email'], $pdo)) && isEqualPassword($user, $_POST['mdp'])) {
        login($user);
        if (userConnectedAdmin()) {
            alertSuccess('Congratulations! You are now logged in as Admin!');
        }
    } else {
        alertError('Invalid password or email');
    }
}
if (userConnected()) {
    header('Location:index.php');
    exit();
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
    <title>Signin Template · Bootstrap v5.3</title>

    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="../assets/sign-in.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
    <?php require_once('../_alerts.php') ?>
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input name="email" type="email" value="<?= $_POST['email'] ?? '' ?>" class="form-control" id="floatingInput-email" placeholder="email">
            <label for="floatingInput-email">email</label>
        </div>
        <div class="form-floating">
            <input name="mdp" type="password" value="<?= $_POST['mdp'] ?? '' ?>" class="form-control" id="floatingInput-mdp" placeholder="mdp">
            <label for="floatingInput-mdp">mdp</label>
        </div>
        <button class="btn btn-primary w-100" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">Or <a href="registration.php">registration</a></p>
    </form>
</main>
<script src="../assets/bootstrap/bootstrap.min.js"></script>

</body>
</html>
