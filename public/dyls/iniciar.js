$(document).ready(function () {

});

function notificacionToast(titulo, mensaje, tipo) {

    // $('#toast-notificacion').delay(2000).fadeOut(200);

    $('#toast-notificacion').removeClass('show');
    $('#toast-notificacion').addClass('hide');
    // $('#toast-notificacion').find('[data-bs-dismiss="toast"]').click();
    $('#toast-notificacion').removeAttr('style');


    $('#toast-notificacion').removeClass('hide');
    $('#toast-notificacion').addClass('show');
    // $('#toast-notificacion').delay(2000).fadeIn(200);
    $('#toast-notificacion').slideDown( 300 ).fadeIn( 400 );

    // $('#toast-notificacion').delay(2000).fadeOut(200);

    // setTimeout(function () {
    //     $('#toast-notificacion').removeClass('show');
    //     $('#toast-notificacion').addClass('hide');
    //     $('#toast-notificacion').removeAttr('style');

    // }, 6000);

}
function alertas(titulo, mensaje, tipo) {
    alerta = '';
    // alerta+='<div class="alert alert-success alert-dismissible " role="alert">'
    //     alerta+='<div>Nice, you triggered this alert message!</div>'
    //     alerta+='<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
    // alerta+='</div>';

    alerta+='<div class="alert alert-left alert-'+tipo+' alert-dismissible fade show mb-3" role="alert">'
        alerta+='<span><i class="fas fa-thumbs-up"></i></span>'
        alerta+='<span> This is a success alert—check it out!</span>'
        alerta+='<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
    alerta+='</div>';
    $('#respuestas-alertas').append(alerta);
    console.log();
}
