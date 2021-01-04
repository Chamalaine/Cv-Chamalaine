$(document).ready(function () {
    $('#contact').submit(function (event) {
        
        event.preventDefault();

        // Mise en place du formulaire asynchrone 
        $.post($(this).attr('action'), $(this).serializeArray(), function (data) {


            // On stock notre div d'alerte
            let $alert = $('#alerte');


            // Affichage du message selon la réussite ou non de l'envoie du mail
            if (data.result==="succes") {
                $alert.addClass('alert-success').text('Le message a bien été envoyé').removeClass('d-none alert-danger');
            } else {
                $alert.addClass('alert-danger').text('Remplissez correctement le formulaire').removeClass('d-none alert-success');
            }
        });
    });
});



// Script pour la barre de consentement de cookie en utilisant la librairie cookieconsent
window.cookieconsent.initialise({
        
    "palette": {
  
      "popup": {
  
        "background": "#1CBCD7"
  
      },
  
      "button": {
  
        "background": "#fafafa",
  
        "text": "#1CBCD7"
  
      }
  
    },
  
    "position": "bottom-left",
  
    "content": {
  
      "message": "En poursuivant votre navigation, vous acceptez l'utilisation de cookies pour garantir une bonne expérience sur notre site.",
  
      "dismiss": "OK",
  
      "link": "En savoir plus",
  
      "href": "https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi"
  
    }
  
  });