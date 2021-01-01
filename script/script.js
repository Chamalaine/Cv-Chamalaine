$(document).ready(function () {
    $('#contact').submit(function (event) {
        
        event.preventDefault();

        $.post($(this).attr('action'), $(this).serializeArray(), function (data) {
            let $alert = $('#alerte');

            if (data.result==="succes") {
                $alert.addClass('alert-success').text('Le message a bien été envoyé').removeClass('d-none alert-danger');
            } else {
                $alert.addClass('alert-danger').text('Remplissez correctement le formulaire').removeClass('d-none alert-success');
            }
        });
    });
});