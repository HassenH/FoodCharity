<?php
session_start();
require_once('navbar.php');
?>
<div class="container">
    <div class="row my-5">
        <?php require_once('profilList.php'); ?>
        <div class="col-12 col-md-9">
            <div class="card border-0">
                <div class="card-header bg-red text-white text-center p-0 border-bottom-0">
                    <h1 class="card-title mb-3">Mes Statistiques</h1>
                </div>
                <div class="card-body p-0">
                    <div class="row align-items-center">
                        <div class="col-sm-6 text-center">
                            <img src="assets/img/48.jpg" class="img-fluid rounded-circle imgProfil mt-2" alt="">
                            <h2 class="mt-2s">Hassen Hadhri</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled ml-3">
                                <li class="my-2">Inscrit le 27 avril 2019</li>
                                <li class="my-2">
                                    <div class="form-inline">
                                        <span class="mr-2">Dons réalisés : 4 </span>
                                    </div>
                                </li>
                                <li class="my-2">
                                    <div class="form-inline">
                                        <span class="mr-2">Dons collectés : Aucun</span>
                                    </div>
                                </li>
                                <li class="my-2">
                                    <div class="form-inline">
                                        <span>Note <i class="oi oi-info cursor-pointer text-primary mr-1" data-toggle="popover" title="Note moyenne basée sur les dons et les collectes"></i>: </span>
                                        &nbsp;Aucune
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

<?php
require_once('footer.php');
?>
