$(document).ready(function () {
    $('#contact').submit(function (event) {
        
        event.preventDefault();

        $.post($(this).attr('action'), $(this).serializeArray(), function (data) {
            let $alert = $('#contact div');

            if (data.result===1) {
                $alert.addClass('alert-success').text('Le message a bien été envoyé !').removeClass('d-none');
            } else {
                $alert.addClass('alert-danger').text('Erreur lors de l\'envoi du message !').removeClass('d-none');
            }
        });
    });
});