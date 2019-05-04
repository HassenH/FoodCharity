<?php
include 'navbar.php'
?>
<div class="container">
  <div class="row my-5">
    <?php include 'listprofil.php' ?>
    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
      <div class="card border-0">
        <div class="card-header text-white text-center p-0 border-bottom-0 ">
          <h1 class="card-title mb-3">Mon compte</h1>
        </div>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card-body">
              <h2 class="card-title">Hassen Hadhri</h2>
              <p class="card-text">Email : </strong> hadhri-h@live.fr</p>
              <p class="card-text">Téléphone mobile : </strong> 06 09 72 29 16</p>
              <a class="btn btn-md btn-block btn-profil text-white" href="/profil/modification" title="Modification du compte"><i class="fas fa-pencil-alt"></i> Modifier vos informations</a>
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
