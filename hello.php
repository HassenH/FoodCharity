<?php
include 'navbar.php'
?>

<div class="container">
  <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
    <form action="donation.php" method="POST">
      <div id="makeDonationPage" class="row justify-content-center my-4">
        <div class="col-12">
          <div class="card border-0">
            <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
              <h1 class="card-title mb-3">Faire un don</h1>
            </div>
            <div class="card-body p-0">
                <div class="row justify-content-center my-4">
                  <img src="assets/img/multistep2.png" class="multistep" alt="Descritpion">
                </div>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php
include 'footer.php'
 ?>
