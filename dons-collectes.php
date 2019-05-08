<?php
include 'navbar.php'
?>

<div class="container">
  <div class="row my-5">
    <?php include 'listprofil.php' ?>
    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
      <div class="card border-0">
        <div class="card-header text-white text-center p-0 border-bottom-0 ">
          <h1 class="card-title mb-3">Mes dons collectés</h1>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card-body">
              <a class="cursor-pointer" href="/donation/creation" title="Faire un don"><i class="fas fa-plus m-3"></i>Faire un don</a>
              <table id="list-donations" class="table table-responsive table-bordered table-hover text-center" data-toggle="table" data-search="true" data-pagination="true" data-locale="fr">
                <thead>
                  <tr>
                    <th data-field="numero" data-sortable="true" data-width="5%" class="text-center">N°</th>
                    <th data-field="category" data-sortable="true" data-width="30%" class="text-center">Catégorie(s)</th>
                    <th data-field="title" data-sortable="true" data-width="20%" class="text-center">Titre</th>
                    <th data-field="deliveryType" data-sortable="true" data-width="10%" class="text-center">Remise</th>
                    <th data-field="status" data-sortable="true" data-width="10%" class="text-center">Status</th>
                    <th data-field="dateStatus" data-sortable="true" data-width="10%" class="text-center">Date</th>
                    <th data-field="note" data-sortable="true" data-width="10%" class="text-center">Note</th>
                    <th data-width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>277</td>
                    <td>
                      <img class="img-fluid mr-2 mb-1" src="/images/150x150/5a747bb38dbb8.png" width="40" alt="Produits frais" data-toggle="tooltip" data-placement="bottom" title="Produits frais">
                    </td>
                    <td>
                      Viande
                    </td>
                    <td>
                      <img class="img-fluid" src="/bundles/app/img/Collecte-association.svg" width="40" alt="Demande de collecte par une association" data-toggle="tooltip" data-placement="bottom" title="Demande de collecte par une association">
                    </td>
                    <td>
                      En cours                                                                                                                </td>
                      <td>07/05/2019</td>
                      <td>                                    </td>
                      <td>
                        <a href="/donation/show/277" title="Intervenir">
                          <span class="oi oi-pencil mx-2"></span>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'footer.php'
  ?>
