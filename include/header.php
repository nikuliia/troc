<?php /** @var string $validate */ ?>
<?php /** @var string $erreur */ ?>
<?php /** @var \PDO $pdo */ ?>
<?php /** @var string $title */ ?>
<?php /** @var string $erreur_index */ ?>
<?php /** @var string $validate_index */ ?>

<?php
require_once('include/init.php');

if(isset($_GET['action']) && $_GET['action'] === 'validate' ){
    $validate .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <strong>Congratulations !</strong> You have successfully registered 😉, you can now log in !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
}

if($_POST){
    $verifyUser = $pdo->prepare(" SELECT * FROM membre WHERE pseudo = :pseudo ");
    $verifyUser->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $verifyUser->execute();

    if($verifyUser->rowCount() == 1){
        $user = $verifyUser->fetch(PDO::FETCH_ASSOC);
        if(password_verify($_POST['pwd'], $user['pwd'])){
            foreach($user as $key => $value){
                if($key !== 'pwd'){
                    $_SESSION['user'][$key] = $value;

                    if(userConnectedAdmin()){
                        header('location:' . URL . 'admin/index.php?action=validate');
                    }else{
                        header('location:' . URL . 'profil.php?action=validate');
                    }
                }
            }
        }else{
            $erreur .= '<div class="alert alert-danger" role="alert">Erreur, vous vous etes trompés de mot de passe</div>';
        }
    }else{
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur, votre n\'existe pas en BDD. Vous vous etes peut-etre trompé</div>';
    }
}

?>

<!-- $erreur .= '<div class="alert alert-danger" role="alert">Erreur pseudo inconnu !</div>'; -->

<!-- $validate .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                  Félicitations <strong>' . $_SESSION['membre']['pseudo'] .'</strong>, vous etes connecté(e) 😉 !
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>'; -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="logo.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- links pour les icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- si existe une variable $title, alors on affiche ici la valeur de $title. Mais si elle n'existe pas, alors on affiche une valeur par défaut: La Boutique -->
    <title><?= isset($title) ? $title : "Troc" ?></title>
    <link rel="icon" type="image/svg" href="/troc_logo_.svg">
</head>
<body>

<header>

    <!-- ------------------- -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= URL ?>"><img src="<?= URL ?>img/boutique_logo.webp" alt="..."></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mt-2">
                    <a class="nav-link" href="<?= URL ?>">Troc</a>
                </li>
               <li class="nav-item">
                        <a class="nav-link" href="?public="><button type="button" class="btn btn-outline-success <?= (isset($_GET['public']) && $_GET['public'] == $menuPublic['public']) ? 'active' : '' ?>"><?= ucfirst($menuPublic['public']) ?></button></a>
                    </li>

                <!-- ---------- -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- -------------------------- -->
                <?php if(userConnected()): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-outline-success">Espace <?= $_SESSION['user']['pseudo'] ?> <strong></strong></button>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- je personnalise l'onglet avec le pseudo de la personne connectée -->
                            <a class="dropdown-item" href="<?= URL ?>profil.php">Profil <?= $_SESSION['user']['pseudo'] ?></a>
                            <a class="dropdown-item" href="<?= URL ?>panier.php">Panier <?= $_SESSION['user']['pseudo'] ?></a>
                            <a class="dropdown-item" href="<?= URL ?>connexion.php?action=deconnexion">Déconnexion</a>
                        </div>
                    </li>
                <?php else: ?>
                    <!-- ---------------------------- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-outline-success">Espace Membre</button>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= URL ?>inscription.php"><button class="btn btn-outline-success">Inscription</button></a>
                            <a class="dropdown-item"><button class="btn btn-outline-success" data-toggle="modal" data-target="#connexionModal">
                                    Connexion
                                </button></a>
                            <a class="dropdown-item" href="<?= URL ?>panier.php"><button class="btn btn-outline-success px-4">Panier</button></a>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- ------------------------------------ -->
                <?php if(internauteConnecteAdmin()): ?>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="admin/index.php"><button type="button" class="btn btn-outline-success">Admin</button></a>
                    </li>
                <?php endif; ?>
                <!-- ------------------------------------ -->
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

</header>

<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><img src="<?= URL ?>img/boutique_logo.webp"> La Boutique</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">

                    <form name="connexion" method="POST" action="">
                        <div class="row justify-content-around">
                            <div class="col-md-4 mt-4">
                                <label class="form-label" for="pseudo"><div class="badge badge-dark text-wrap">Pseudo</div></label>
                                <input class="form-control btn btn-outline-success" type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo">
                            </div>
                        </div>

                        <div class="row justify-content-around">
                            <div class="col-md-6 mt-4">
                                <label class="form-label" for="mdp"><div class="badge badge-dark text-wrap">Mot de passe</div></label>
                                <input class="form-control btn btn-outline-success" type="password" name="mdp" id="mdp" placeholder="Votre mot de passe">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" name="connexion" class="btn btn-lg btn-outline-success mt-3">Connexion</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------- -->

    <h1 class="text-center mt-5"><div class="badge badge-dark text-wrap p-3">La Boutique</div></h1>

    <?= $erreur_index ?>
    <?= $validate_index ?>

    <h2 class="text-center pb-5">Notre Catalogue. Nos Produits !</h2>