<?php
/** @var string $titreCategorie */
/** @var string $produit */
/** @var string $titrePublic */

require_once('include/init.php');

//$title = "test";

require_once('include/header.php')
?>


    <div class="container-fluid">


            <!-- -Premier: j'affiche par categorie -->
            <?php if (isset($_GET['categorie'])): ?>
                <div class="col-md-8">

                    <div class="text-center my-5">
                        <img class='img-fluid' src="img/la_boutique_bis.webp" alt="Bandeau de La Boutique"
                             loading="lazy">
                    </div>

                    <div class="row justify-content-around">
                        <h2 class="py-5"><span
                                class="badge badge-dark text-wrap">Nos <?= $titreCategorie['categorie'] ?></span>
                        </h2>
                    </div>

                    <nav aria-label="">
                        <ul class="pagination justify-content-end">
                            <li class="mx-1 page-item  ">
                                <a class="page-link text-success" href="" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <!--  -->
                            <li class="mx-1 page-item ">
                                <a class="btn btn-outline-success " href=""></a>
                            </li>
                            <!--  -->
                            <li class="mx-1 page-item ">
                                <a class="page-link text-success" href="" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <!-- second bloc: J'affiche par public -->
            <?php elseif (isset($_GET['public'])): ?>
                <div class="col-md-8">

                    <div class="text-center my-5">
                        <img class='img-fluid' src="img/la_boutique_bis.webp" alt="Bandeau de La Boutique"
                             loading="lazy">
                    </div>

                    <div class="row justify-content-around">

                        <h2 class="py-5">
                            <div class="badge badge-dark text-wrap"> <?= ($_GET['public'] === 'mixte') ? "Nos modèles " . $titrePublic['public'] : "Nos modèles pour " . $titrePublic['public'] ?>s </div>
                        </h2>
                    </div>

                    <div class="row justify-content-around text-center">

                        <?php while ($produit = $afficheProduits->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="card mx-3 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                                <a href="fiche_produit.php?id_produit=<?= $produit['id_produit'] ?>"><img src="<?= URL . "img/" . $produit['photo'] ?>" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h3 class="card-title"><?= $produit['titre'] ?></h3>
                                    <h3 class="card-title"><span class="badge badge-dark text-wrap"><?= $produit['prix'] ?> €</span></h3>
                                    <p class="card-text"><?= $produit['description'] ?></p>
                                    <a href="fiche_produit.php?id_produit=<?= $produit['id_produit'] ?>" class="btn btn-outline-success"><i class='bi bi-search'></i> Voir Produit</a>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>

                    <nav aria-label="">
                        <!-- dans les 3 <a href> je dois faire référence à la catégorie, en plus de la page, sinon cela ne fonctionnera pas -->
                        <ul class="pagination justify-content-end">
                            <li class="mx-1 page-item  ">
                                <a class="page-link text-success" href="" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <li class="mx-1 page-item ">
                                <a class="btn btn-outline-success " href=""></a>
                            </li>

                            <li class="mx-1 page-item ">
                                <a class="page-link text-success" href="" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <!-- AUCUNE CATEGORIE OU PUBLIC, J'AFFICHE LA GRANDE IMAGE -->
            <?php else: ?>

                <div class="col-md-8">

                    <div class="row justify-content-around py-5">
                        <img class='img-fluid' src="img/la_boutique.webp" alt="Bandeau de La Boutique" loading="lazy">
                    </div>

                </div>
            <?php endif; ?>

        </div>

    </div>
    <div class="container">

<?php
require_once('include/footer.php')
?>