
$('#carousel-example').on('slide.bs.carousel', function (e) {

   /*
    CC 2.0 License Iatek LLC 2018
    Attribution required
    */
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

/*
 * On sélectionne l'input phoneNumber dans le formulaire
 * On lui applique la fonction mask à laquelle on donne en paramètre le nombre de chiffres représentés par des 0 et ce qui les sépare
 */
$('#phoneNumber').mask('00 00 00 00 00');