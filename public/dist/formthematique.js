 $(function() {
     var $thematique = $("#addthematique");

     if($thematique.length){
         $thematique.validate({
             rules:{
                 nom:{
                     required: true
                 },
                 valeur: {
                    required: true,
                    min: 1,
                    number: true
                 }
             },
             messages:{
                 nom:{
                     required: 'Entre votre nom !'
                 },
                valeur: {
                    required: 'Veuillez entre le valeur',
                    min: "Le valeur doit superieur ou egale  à 5"
                }
             }
         })
     }
 })