<?php
session_start();
require_once 'navbar.php';
?>
<!-- BANNER -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 no-gutter">
            <img src="assets/img/account.png" class="no-gutter" alt="Banniere">
        </div>
    </div>
</div>
<!-- LEARNMORE -->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
            <h1>Vous voulez en savoir plus ?</h1>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center mt-2">
            <img src="assets/img/Gateau.png" class="card-img" alt="Gâteau">
            <h2 class="my-3">Comment ca marche ?</h2>
            <p>Agissez contre le gaspillage alimentaire en donnant vos invendus ou des denrées alimentaires dont vous ne savez que faire a une association. Choissisez l'association à laquelle vous voulez donner et convenez d'un rendez-vous pour remettre vos produits.</p>
            <a href="howitworks.php" class="btn roundButton my-2" role="button">En savoir plus</a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center mt-2">
            <img src="assets/img/pasteque.png" class="card-img" alt="Pastèque">
            <h2 class=" my-2">Pourquoi, pour qui ?</h2>
            <p>Foodcharity a pour mission de réduire le gaspillage alimentaire, en aidant les grandes surfaces et les particuliers à faire des dons alimentaire directement aux associations. Plus encore, le rôle de Foodcharity est de sensibiliser et d'éduquer les consommateurs pour lutter plus efficacement et durablement contre le gaspillage alimentaire, tous les jours !</p></p>
            <a href="why.php" class="btn roundButton my-2" role="button">En savoir plus</a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 text-center mt-2">
            <img src="assets/img/Cupcake.png" class="card-img" alt="Cupcake">
            <h2 class="my-2">Nos valeurs ?</h2>
            <p>Agissez contre le gaspillage alimentaire en donnant sur FoodCharity</p>
            <a href="ourValues.php" class="btn roundButton my-2" role="button">En savoir plus</a>
        </div>
    </div>
</div>
<!-- CAROUSEL -->
<div class="partners d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="text-center">Quelques-unes des enseignes les plus populaires sur FoodCharity</h3>
            </div>
            <div class="container carouselPartners">
                <div id="carousel-example" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active">
                            <img src="assets/img/carrefour_city_logo.png" class="img-fluid mx-auto d-block" alt="img1">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/brioche_logo.png" class="img-fluid mx-auto d-block" alt="img2">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/franprix_logo.png" class="img-fluid mx-auto d-block" alt="img3">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/subway_logo.png" class="img-fluid mx-auto d-block" alt="img4">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/pomme_de_pain_logo.png" class="img-fluid mx-auto d-block" alt="img5">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/carrefour_city_logo.png" class="img-fluid mx-auto d-block" alt="img6">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/franprix_logo.png" class="img-fluid mx-auto d-block" alt="img7">
                        </div>
                        <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3">
                            <img src="assets/img/subway_logo.png" class="img-fluid mx-auto d-block" alt="img8">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- VISION -->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4">
            <h1 class="mt-2">Notre vision</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
            <p>Chez FoodCharity, on oeuvre pour un monde avec du sens, où la nourriture produite est consommée et ne finit pas tragiquement gaspillée. Notre ambition c'est d'y arriver ensemble, parce qu'on croit fort au pouvoir qui réside en chacun de nous.</p>
            <p>Toutes nos petites actions, mises bout à bout, peuvent avoir un impact immense ! Alors rejoins la grande famille et deviens le héros 2 en 1 des temps modernes.</p>
            <a href="" class="btn roundButton" role="button">En savoir plus</a>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 embed-responsive embed-responsive-16by9">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/KugQ8RqIdXE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class=" mt-4">Grâce à vous, nous avons aidé à sauver : </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-5 offset-sm-1 col-md-5 offset-md-1 text-center">
            <h5 class="mt-3">Tonnes de nourriture sauvée :</h5>
            <p class="number">160</p>
        </div>
        <div class="col-12 col-sm-5 offset-sm-1 col-md-5 offset-md-1 text-center">
            <h5 class="mt-3">Produits sauvés :</h5>
            <p class="number">10000</p>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 border-right mt-2 mb-4">
                <h1>Passe a l'action</h1>
                <p></p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2 mb-4">
                <h1>Vous êtes commercant</h1>
                <p>Vous êtes invités à rejoindre notre démarche anti gaspillage en proposant les produits encore consommables que vous n’utiliserez pas à travers notre plateforme, qu’il s’agisse de petites quantités ou de gros volumes.</p>
            </div>
            <div class="col-2 mt-2">
                <img src="assets/img/kawaiilove.png" alt="">
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
