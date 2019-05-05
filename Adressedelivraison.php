<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <div class="container">
    <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
      <form action="donation.php" method="POST">
        <div class="row justify-content-center my-4">
          <div class="col-12">
            <div class="card border-0" id="makeDonationPage">
              <div class="card-header text-white text-center p-0 border-bottom-0">
                <h1 class="card-title mb-3 ">Faire un don</h1>
              </div>
              <div class="card-body p-0">
                <div class="row justify-content-center my-4">
                  <div class="col-12">
                    <img src="assets/img/multistep2.png" class="d-flex justify-content-center" alt="Descritpion">
                  </div>
                </div>
                <div class="row my-4 px-5">
                  <div class="col-12">
                    <div class="card-header bg-red pb-0 text-center">
                      <p class="text-white font-weight-bold text-uppercase">Récapitulatif de votre don</p>
                    </div>
                    <div class="card-block">
                      <table class="table table-bordered table-hover border-dark">
                        <tbody>
                          <tr>
                            <td>Titre de l'annonce</td>
                            <td>Viande</td>
                          </tr>
                          <tr>
                            <td>Catégorie(s)</td>
                            <td>
                              <ul class="list-unstyled mb-0">
                                <li>Produits frais</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Nombre de colis</td>
                            <td>
                              <ul class="list-unstyled mb-0">
                                <li>1 Sac(s) isotherme(s)</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Estimation du poids</td>
                            <td>2 Kg</td>
                          </tr>
                          <tr>
                            <td>Option de remise</td>
                            <td>Demande de collecte par une association</td>
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
      </form>
    </div>
  </form>
<?php } ?>
</div>
</div>

<?php
include 'footer.php'
 ?>
