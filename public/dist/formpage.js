const { number } = require("joi");

$(function() {
    var $page = $("#formpage");

    if($page.length){
        $page.validate({
            rules:{
                nom:{
                    required: true
                },
                numero: {
                   required: true,
                   number: true
                },
                date: {
                    required: true
                },
                thematique_id: {
                    required: true
                },
                objet:{
                    required: true
                },
                lieu: {
                   required: true,
                 
                },
                latitude: {
                    required: true
                },
                longitude: {
                    required: true
                },
                description: {
                    required: true,
                    minlength: 5,
                    maxlength: 100
                }

            },
            messages:{
                nom:{
                    required: 'Entre votre nom !'
                },
               numero: {
                   required: 'Veuillez entre le numero',
                   number: "Le valeur est en chiffre"
               }, 
               date: {
                   required: 'Veuilles entre la date'
               },
               thematique_id: {
                required: 'Veuillez selectionner le thématique'
               },
               objet:{
                required: 'Saissir le nom de votre objet '
               },
                lieu: {
                    required: 'Veuillez entre le lieu',
                    
                }, 
                latitude: {
                    required: 'Il faut entre le coordonnée '
                },
                longitude: {
                    required: 'Il faut entre le coordonnée'
                },
                description: {
                    required: 'Veuillez mettre quelle description',
                    minlength: "Le description doivez avoir au moin 12 lettre",
                    maxlength:  "Le description ne doivez pas depasser 100 lettre",
                }


            }
        })
    }
})