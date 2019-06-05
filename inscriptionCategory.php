<?php
include 'navbar.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 imgHeaderRegistration d-flex justify-content-center align-items-center">
            <h1 class="display-3">Inscrivez-vous</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row my-4">
        <div class="text-center col-12 col-sm-4 col-md-4 col-lg-4 usersCard">
            <div class="shadow p-5 mb-5 bg-white rounded">
                <i class="fas fa-user fa-3x"></i>
                <a href="inscription.php"><h1>Particulier</h1></a>
            </div>
        </div>
        <div class="text-center col-12 col-sm-4 col-md-4 col-lg-4 usersCard">
            <div class="shadow p-5 mb-5 bg-white rounded">
                <i class="fas fa-heart fa-3x"></i>
                <a href="inscriptionCommerce.php"><h1>Commerce</h1></a>
            </div>
        </div>
        <div class="text-center col-12 col-sm-4 col-md-4 col-lg-4 usersCard">
            <div class="shadow p-5 mb-5 bg-white rounded">
                <i class="fas fa-heart fa-3x"></i>
                <a href="inscriptionAssociation.php"><h1>Association</h1></a>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
