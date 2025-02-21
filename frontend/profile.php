<?php

/** @var string $validate */
require_once('includes/init.php');

//$title = "Profil de " . $_SESSION['user']['nickname'];

// si le user n'est pas connecté je le redirige car il ne peut accéder a cette page
if(!userConnected()){
    header('location:login.php');
    exit();
}

// s'affichera dans la balise <title> de header lorsqu'on sera sur la page profil
$title = "Profile of " . $_SESSION['user']['nickname'];

// récupération du message de validation qui confirme la connexion réussie
if(isset($_GET['action']) && $_GET['action'] === 'validate'){
    $validate .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    Congratulations <strong>' . $_SESSION['user']['pseudo'] .'</strong>, you are connected 😉 !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
}

require_once('includes/_header.php')
?>
    <!-- ternaire pour personnaliser le <h2> selon que le user connecté est admin ou non -->
    <h2 class="text-center my-5"><span class="badge badge-dark text-wrap p-3">Hello <?= (userConnectedAdmin()) ? $_SESSION['user']['nickname'] . ", you are admin of the website" : $_SESSION['user']['nickname'] ?></span></h2>

    <!-- pour afficher le message de validation -->
<?= $validate ?>

    <!-- $validate .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        Félicitations <strong>' . $_SESSION['user']['nickname'] .'</strong>, vous etes connecté 😉 !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'; -->



    <div class="row justify-content-around py-5">
        <div class="col-md-3 text-center">

            <ul class="list-group">
                <!-- je récupère dans chaque <li> l'information qui m'interesse dans le fichier session[user] -->
                <li class="btn btn-outline-success text-dark my-3 shadow bg-white rounded"><?= $_SESSION['user']['nom'] ?></li>
                <li class="btn btn-outline-success text-dark my-3 shadow bg-white rounded"><?= $_SESSION['user']['prenom'] ?></li>
                <li class="btn btn-outline-success text-dark my-3 shadow bg-white rounded"><?= $_SESSION['user']['email'] ?></li>
                <li class="btn btn-outline-success text-dark my-3 shadow bg-white rounded"><?= $_SESSION['user']['adresse'] ?></li>
            </ul>
        </div>
    </div>

<?php
require_once('includes/_footer.php');