<?php
include 'navbar.php'
?>
<div class="container">
  <div class="row my-5">
    <?php include 'listprofil.php' ?>
    <div class="col-12 col-md-9">
      <div class="card border-0">
        <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
          <h1 class="card-title mb-3">Demande de suppresion de compte</h1>
        </div>
        <div class="card-body p-0">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 card border-0 bg-transparent">
              <div class="card-header text-center border-bottom-0 bg-light">
                <h3 class="ml-4 mb-0 card-title d-inline-block">Sélectionnez la raison de votre demande :</h3>
              </div>
            </div>
          </div>
          <div class="row card-body pt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="form-group mb-0">
                <select class="form-control" id="cause" name="cause">
                  <option value="J'ai un autre compte">J'ai un autre compte</option>
                  <option value="Je ne souhaite plus effectuer ou collecter de don pour des raisons personnelles">Je ne souhaite plus effectuer ou collecter de don pour des raisons personnelles</option>
                  <option value="Je ne souhaite plus effectuer ou collecter de don, en raison de problèmes avec le site">Je ne souhaite plus effectuer ou collecter de don, en raison de problèmes avec le site</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row form-group mb-5 justify-content-end">
    <div class="col-12 mt-3">
      <input class="btn btn-bg-red btn-lg btn-block text-wrap-xs btn-submit" type="submit" value="Transmettre ma demande" />
    </div>
  </div>
</div>
</div>
</div>


<?php
include 'footer.php'
?>
