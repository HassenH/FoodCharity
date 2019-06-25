<?php
session_start();
require_once 'navbar.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="display-4 my-4">Pourquoi ?</h1>
            <p class="underTitle">La situation en france ..</p>
            <p class="lead">Chaque année en France (source ADEME) : une personne jette en moyenne 7 kilos d’aliments non déballés. Le gaspillage représente 10 millions de tonnes soit 16 milliards d'euros.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <img src="assets/img/pourquoi.png" class="situation" alt="situation">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="" class="btn roundButton my-2" role="button">Rejoins-nous</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="display-4">Pour qui ?</h1>
            <p class="lead">La France s’est engagée au travers du Pacte national de lutte contre le gaspillage alimentaire à réduire de moitié le gaspillage alimentaire à horizon 2025 et a adopté une une loi en ce sens (LOI n° 2016-138 du 11 février 2016).
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center mt-2 mb-5">
            <img src="assets/img/coeur.png" class="coeur shadow bg-white rounded" alt="assiette">
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 mt-5">
            <p>Dans ce contexte, FoodCharity propose de mettre en relation les acteurs de la chaîne de production, de transformation, de distribution, les consommateurs et les associations en direct pour donner une nouvelle vie à des produits encore consommables qui pourraient finir à la poubelle.</p>
            <p>Il s’agit d’une alternative anti gaspillage pour tous qui vise à redistribuer des denrées alimentaires avant qu’elles ne soient plus consommables : <p>
            <ul>
                <li>De particulier ou de professionnel à des associations.</li>
            </ul>
        </div>
    </div>
</div>



<?php
require_once 'footer.php';
?>
