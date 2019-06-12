/*
 * On sélectionne l'input phoneNumber dans le formulaire
 * On lui applique la fonction mask à laquelle on donne en paramètre le nombre de chiffres représentés par des 0 et ce qui les sépare
 */
$('#phoneNumber').mask('00 00 00 00 00');

// Je déclare une fonction, je sélectionne la méthode tooltip()
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
});

$('#carousel-example').on('slide.bs.carousel', function(e) {

    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i = 0; i < it; i++) {
            // append slides to end
            if (e.direction == "left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            } else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});

///Ajax pour l'autocomplétion - remplit le champs ville à la saisie du code postal

$(function() {

//Etape 1 : Je crée mon évènements (et je le teste)
    $('#search').keyup(function() {
        /**
         * Etape 2 : j'appelle la fonction ajax
         * J'utilise :
         *      * $.post si je veux envoyer de données en post, cela enverra une variable $_POST
         *      * $.get si je veux en envoyer en get, cela enverra une variable $_GET
         * Je lie mon controller EN PARTANT DU SCRIPT.JS
         * J'envoie ce que je dois envoyer. Ici, je veux envoyer ce que j'ai tapé dans mon champs
         * de recherche ($('#search').val()) et je veux l'envoyer dans une variable qui s'appellera $_POST['search']
         */
        if ($("#search").val().length >= 3)
            $.post('../../controllers/usersCtrl.php', {
                search: $('#search').val()
                        /**
                         * function (data) est la fonction qui s'éxécutera une fois que le contrôleur aura fini
                         * data est le retour du contrôleur (ce qu'on a mis dans echo json_encode())
                         */
            }, function(data) {
                console.log(data);
                /*
                 * Etape 4 : L'affichage
                 * Je récupère ce qui a été retourné du PHP grâce au echo json_encode, on le convertit en tableau d'objet js et on le stocke
                 * dans la variable results.
                 */
                $('.alert').remove();
                $('#city').empty();
                var results = $.parseJSON(data);
                //4.1 : Je vide le tableau pour préparer l'affichage (enlever les résultats déjà présents

                //4.2 : Je vérifie que le tableau de résultats n'est pas vide
                if (results.length > 0) {
                    $.each(results, function(key, city) {
                        /*
                         * 4.4 : Je crée une variable qui contiendra la concaténation des balises servant à l'affichage (ici des cellules de tableau)
                         */
                        var display = '<option value="' + city.id + '">' + city.city + ' ' + '</option >'
                        //J'ajoute la ligne que je viens de créer au tableau
                        $('#city').append(display);
                    });
                } else {
                    //4.4 : Si mon tableau est vide, je créer une alerte qui me dira que je n'ai pas de résultat et je l'insère après le tableau
                    var alert = '<div class="alert alert-danger" role="alert">Pas de résultats</div>';
                    $(alert).insertAfter('#city');
                }
            }
            );
    })

});

///Ajax pour l'autocomplétion du formulaire association - remplit le champs ville à la saisie du code postal

$(function() {

    //Etape 1 : Je crée mon évènements (et je le teste)
    $('#search').keyup(function() {
        /**
         * Etape 2 : j'appelle la fonction ajax
         * J'utilise :
         *      * $.post si je veux envoyer de données en post, cela enverra une variable $_POST
         *      * $.get si je veux en envoyer en get, cela enverra une variable $_GET
         * Je lie mon controller EN PARTANT DU SCRIPT.JS
         * J'envoie ce que je dois envoyer. Ici, je veux envoyer ce que j'ai tapé dans mon champs
         * de recherche ($('#search').val()) et je veux l'envoyer dans une variable qui s'appellera $_POST['search']
         */
        if ($("#search").val().length >= 3)
            $.post('../../controllers/commerceCtrl.php', {
                search: $('#search').val()
                        /**
                         * function (data) est la fonction qui s'éxécutera une fois que le contrôleur aura fini
                         * data est le retour du contrôleur (ce qu'on a mis dans echo json_encode())
                         */
            }, function(data) {
                console.log(data);
                /*
                 * Etape 4 : L'affichage
                 * Je récupère ce qui a été retourné du PHP grâce au echo json_encode, on le convertit en tableau d'objet js et on le stocke
                 * dans la variable results.
                 */
                $('.alert').remove();
                $('#city').empty();
                var results = $.parseJSON(data);
                //4.1 : Je vide le tableau pour préparer l'affichage (enlever les résultats déjà présents

                //4.2 : Je vérifie que le tableau de résultats n'est pas vide
                if (results.length > 0) {
                    //4.3 : Je parcours le tableau (similaire à foreach($results as $key=>$patient). patient est un objet contenu dans le tableau
                    $.each(results, function(key, city) {
                        /*
                         * 4.4 : Je crée une variable qui contiendra la concaténation des balises servant à l'affichage (ici des cellules de tableau)
                         * On y injecte les information du patient
                         */
                        var display = '<option value="' + city.id + '">' + city.city + ' ' + '</option >'
                        //J'ajoute la ligne que je viens de créer au tableau, cette opération se répètera pour chaque patient dans le tableau results
                        $('#city').append(display);
                    });
                } else {
                    //4.5 : Si mon tableau est vide, je créer une alerte qui me dira que je n'ai pas de résultat et je l'insère après le tableau
                    var alert = '<div class="form-control alert alert-danger" role="alert">Pas de résultats</div>';
                    $(alert).insertAfter('#city');
                }
            }
            );
    })

});

///Ajax pour l'autocomplétion du formulaire association - remplit le champs ville à la saisie du code postal

$(function() {

    //Etape 1 : Je crée mon évènements (et je le teste)
    $('#search').keyup(function() {
        /**
         * Etape 2 : j'appelle la fonction ajax
         * J'utilise :
         *      * $.post si je veux envoyer de données en post, cela enverra une variable $_POST
         *      * $.get si je veux en envoyer en get, cela enverra une variable $_GET
         * Je lie mon controller EN PARTANT DU SCRIPT.JS
         * J'envoie ce que je dois envoyer. Ici, je veux envoyer ce que j'ai tapé dans mon champs
         * de recherche ($('#search').val()) et je veux l'envoyer dans une variable qui s'appellera $_POST['search']
         */
        if ($("#search").val().length >= 3)
            $.post('../../controllers/associationCtrl.php', {
                search: $('#search').val()
                        /**
                         * function (data) est la fonction qui s'éxécutera une fois que le contrôleur aura fini
                         * data est le retour du contrôleur (ce qu'on a mis dans echo json_encode())
                         */
            }, function(data) {
                console.log(data);
                /*
                 * Etape 4 : L'affichage
                 * Je récupère ce qui a été retourné du PHP grâce au echo json_encode, on le convertit en tableau d'objet js et on le stocke
                 * dans la variable results.
                 */
                $('.alert').remove();
                $('#city').empty();
                var results = $.parseJSON(data);
                //4.1 : Je vide le tableau pour préparer l'affichage (enlever les résultats déjà présents

                //4.2 : Je vérifie que le tableau de résultats n'est pas vide
                if (results.length > 0) {
                    //4.3 : Je parcours le tableau (similaire à foreach($results as $key=>$patient). patient est un objet contenu dans le tableau
                    $.each(results, function(key, city) {
                        /*
                         * 4.4 : Je crée une variable qui contiendra la concaténation des balises servant à l'affichage (ici des cellules de tableau)
                         * On y injecte les information du patient
                         */
                        var display = '<option value="' + city.id + '">' + city.city + ' ' + '</option >'
                        //J'ajoute la ligne que je viens de créer au tableau, cette opération se répètera pour chaque patient dans le tableau results
                        $('#city').append(display);
                    });
                } else {
                    //4.5 : Si mon tableau est vide, je créer une alerte qui me dira que je n'ai pas de résultat et je l'insère après le tableau
                    var alert = '<div class="form-control alert alert-danger" role="alert">Pas de résultats</div>';
                    $(alert).insertAfter('#city');
                }
            }
            );
    })

});


///Ajax pour l'autocomplétion du formulaire association - remplit le champs ville à la saisie du code postal

$(function() {

    //Etape 1 : Je crée mon évènements (et je le teste)
    $('#search').keyup(function() {
        /**
         * Etape 2 : j'appelle la fonction ajax
         * J'utilise :
         *      * $.post si je veux envoyer de données en post, cela enverra une variable $_POST
         *      * $.get si je veux en envoyer en get, cela enverra une variable $_GET
         * Je lie mon controller EN PARTANT DU SCRIPT.JS
         * J'envoie ce que je dois envoyer. Ici, je veux envoyer ce que j'ai tapé dans mon champs
         * de recherche ($('#search').val()) et je veux l'envoyer dans une variable qui s'appellera $_POST['search']
         */
        if ($("#search").val().length >= 3)
            $.post('../../controllers/profilCtrl.php', {
                search: $('#search').val()
                        /**
                         * function (data) est la fonction qui s'éxécutera une fois que le contrôleur aura fini
                         * data est le retour du contrôleur (ce qu'on a mis dans echo json_encode())
                         */
            }, function(data) {
                console.log(data);
                /*
                 * Etape 4 : L'affichage
                 * Je récupère ce qui a été retourné du PHP grâce au echo json_encode, on le convertit en tableau d'objet js et on le stocke
                 * dans la variable results.
                 */
                $('.alert').remove();
                $('#city').empty();
                var results = $.parseJSON(data);
                //4.1 : Je vide le tableau pour préparer l'affichage (enlever les résultats déjà présents

                //4.2 : Je vérifie que le tableau de résultats n'est pas vide
                if (results.length > 0) {
                    //4.3 : Je parcours le tableau (similaire à foreach($results as $key=>$patient). patient est un objet contenu dans le tableau
                    $.each(results, function(key, city) {
                        /*
                         * 4.4 : Je crée une variable qui contiendra la concaténation des balises servant à l'affichage (ici des cellules de tableau)
                         * On y injecte les information du patient
                         */
                        var display = '<option value="' + city.id + '">' + city.city + ' ' + '</option >'
                        //J'ajoute la ligne que je viens de créer au tableau, cette opération se répètera pour chaque patient dans le tableau results
                        $('#city').append(display);
                    });
                } else {
                    //4.5 : Si mon tableau est vide, je créer une alerte qui me dira que je n'ai pas de résultat et je l'insère après le tableau
                    var alert = '<div class="form-control alert alert-danger" role="alert">Pas de résultats</div>';
                    $(alert).insertAfter('#city');
                }
            }
            );
    })


/// Script pour la modal , afin de valider une donation

    $(function() {
        //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
        $('#deleteModal').on('show.bs.modal', function(event) {
            //On stocke dans une variable le bouton qui appelle la modale.
            var button = $(event.relatedTarget);
            //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
            var donationId = button.data('id');
            var donationNumber = button.data('number');
            var modal = $(this);
            /*
             * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
             * La fonction append permet de créer un élément dans l'élément apposé devant.
             * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
             */
            modal.find('.modal-body').append('<p>Êtes-vous sûr.e de vouloir supprimer ' + donationNumber + '?</p>');
            modal.find('.modal-footer').append('<a href="donationPage.php?deleteId=' + donationId + '" class="btn btn-danger">Supprimer ce don</a>');
        })
    })

/// Script pour la modal , afin de valider une donation

    $(function() {
        //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
        $('#validDonationModal').on('show.bs.modal', function(event) {
            //On stocke dans une variable le bouton qui appelle la modale.
            var button = $(event.relatedTarget);
            //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
            var donationId = button.data('id');
            var donationNumber = button.data('number');
            var modal = $(this);
            /*
             * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
             * La fonction append permet de créer un élément dans l'élément apposé devant.
             * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
             */
            modal.find('.modal-body').append('<p>Êtes-vous sûr.e de vouloir valider le don N° : ' + donationNumber + ' ?</p>');
            modal.find('.modal-footer').append('<a href="donationPage.php?validStatusId=' + donationId + '" class="btn btn-danger">Valider le don</a>');
        })
    })

    /// Script pour la modal , afin de valider une donation

    $(function() {
        //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
        $('#cancelDonationModal').on('show.bs.modal', function(event) {
            //On stocke dans une variable le bouton qui appelle la modale.
            var button = $(event.relatedTarget);
            //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
            var donationId = button.data('id');
            var donationNumber = button.data('number');
            var modal = $(this);
            /*
             * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
             * La fonction append permet de créer un élément dans l'élément apposé devant.
             * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
             */
            modal.find('.modal-body').append('<p>Êtes-vous sûr.e de vouloir annuler le don N° : ' + donationNumber + ' ?</p>');
            modal.find('.modal-footer').append('<a href="donationPage.php?cancelStatusId=' + donationId + '" class="btn btn-danger">Valider le don</a>');
        })
    })

});

/// Script pour supprimer compte

$(function() {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteUser').on('show.bs.modal', function(event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var donationId = button.data('id');
        var donationNumber = button.data('number');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').append('<p>Êtes-vous sûr.e de vouloir supprimer ' + donationNumber + '?</p>');
        modal.find('.modal-footer').append('<a href="profilDelete.php?deleteId=' + donationId + '" class="btn btn-danger">Supprimer ce don</a>');
    })
})

/// Script pour supprimer un commentaire
$(function() {
    //Fonction qui permet de déclencher les actions que l'on souhaite à l'affichage de la modale
    $('#deleteCommentModal').on('show.bs.modal', function(event) {
        //On stocke dans une variable le bouton qui appelle la modale.
        var button = $(event.relatedTarget);
        //On récupère les attributs data- du bouton qui a appelé la modale. On récupère donc l'id du patient, son nom de famille et son prénom
        var donationId = button.data('id');
        var donationNumber = button.data('number');
        var modal = $(this);
        /*
         * La fonction find trouve un élément dont l'id ou (ici) la classe est passée en paramètre.
         * La fonction append permet de créer un élément dans l'élément apposé devant.
         * Ici dans la div modal-body, on crée un paragraphe qui contient la question de confirmation.
         */
        modal.find('.modal-body').append('<p>Êtes-vous sûr.e de vouloir supprimer le commentaire ' + donationNumber + '?</p>');
        modal.find('.modal-footer').append('<a href="profilComment.php?deleteCommentId=' + donationId + '" class="btn btn-danger">Supprimer ce don</a>');
    })
})
