<?php
require_once('navbar.php');
?>
<div class="container my-5">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
      <div class="card-body p-0">
        <div class="row my-4 justify-content-center">
          <div class="col-12 text-center">
            <img class="img-fluid rounded-circle imgProfil mt-2" src="/assets/img/48.jpg" alt="Photo profil">
            <h2 class="card-title mt-2">Hassen Hadhri</h2>
            <ul class="list-unstyled ml-3">
              <li class="my-2">Inscrit le 27 avril 2019</li>
              <li class="my-2">Dons réalisés : 4 </i></li>
              <li class="my-2"><i class="fas fa-phone"></i></span> 06 09 72 29 16</li>
              <li class="my-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></li>
            </ul>
          </div>
        </div>
        <div class="card-footer border-0 p-0 d-flex justify-content-center rankDonation text-white">
          <p class="pt-2 rankTitle">Super donateur</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-9 col-lg-9 my-4">
      <div class="card border-0">
        <div class="card-header text-white text-center p-0 border-bottom-0 ">
          <h1 class="card-title mb-3">Dons</h1>
        </div>
        <div class="card-body">
          <div class="row">
          <div class="col-12 col-sm-5 justify-content-between my-2">
            <img class="custom-border-img border border-dark" src="/assets/img/panierfraise.jpg" width="270" alt="Donation Image">
            <div class="form-inline">
              <p class="text-uppercase my-3 font-weight-bold">Viande</p>
            </div>
            <div>
              <ul class="list-unstyled">
                <li class="my-2"><u>N° don</u> :277 </li>
                <li class="my-2"><u>Description</u> : Viande  </li>
                <li class="my-2"><u>Date de l’annonce</u> : 07/05/2019</li>
                <li class="my-2"><u>Contenu du don</u> :Produits frais</li>
                <li class="my-2"><u>Nombre de colis</u> :1 Sac(s) isotherme(s)                                                                                </li>
                <li class="my-2"><u>Statut</u> : En cours</li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 my-0 my-5">
            <div class="row">
              <div class="col text-center">
                <div class="dropdown">
                  <button class="btn btn-lg buttonOption dropdown-toggle dropdown-toggle-split w-100" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Intervenir
                  </button>
                  <div class="dropdown-menu dropdown-menu-left w-100" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/donation/edition/277" title="Reprendre la création du don"><span class="oi oi-pencil mr-2"></span>Reprendre la création du don</a>
                    <a class="dropdown-item" href="/donation/delete/277" title="Supprimer le don"><span class="oi oi-trash mr-2"></span>Supprimer le don</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 my-3">
                <button class="btn btn-lg buttonShare"  data-toggle="modal" data-target="#shareDonation">
                  <span class="oi oi-envelope-closed mr-2"></span>Envoyer à un ami</button>
                </div>
              </div>
              <div class="row">
                <ul class="col-12 list-unstyled">
                  <li class="mb-3">
                    <div class="row">
                      <div class="col-2 text-center">
                        <i class="fas fa-dolly fa-2x"></i>
                      </div>
                      <div class="col-10 align-self-center">
                        <span>Demande de collecte par une association</span>
                      </div>
                    </div>
                  </li>
                  <li class="mb-3">
                    <div class="row">
                      <div class="col-2 text-center">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                      </div>
                      <div class="col-10 align-self-center">
                        <p class="m-0">Les Petits Frères des Pauvres Paris 18</p>
                        <p class="m-0">Paris  75007</p>                                                                                                        </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-2 text-center">
                          <i class="fas fa-balance-scale fa-2x"></i>
                        </div>
                        <div class="col-10 align-self-center">
                          <span>1 Kg</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

 <?php
require_once('footer.php');
  ?>
