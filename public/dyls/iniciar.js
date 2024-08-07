$(document).ready(function () {
    sidebarSelecMenu();
});

const  alertas = (titulo, mensaje, tipo) => {

    return new Promise( (resolve, reject) => {
        const random = Math.random();
        alerta = '';
        alerta+='<div id="alerta-'+random+'" class="alert alert-bottom alert-'+tipo+' alert-dismissible fade show mb-3" role="alert">'
            alerta+='<span><i class="fas fa-thumbs-up"></i></span>'
            alerta+='<span class="me-5"> '+mensaje+'</span>'
            alerta+='<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" data-button="'+random+'"></button>'
        alerta+='</div>';
        $('#respuestas-alertas').append(alerta);
        // console.log(random);
        setTimeout(() => {
            $('#respuestas-alertas [data-button="'+random+'"]').click();
        }, 1500);
    })
}
// alertas('titulo', 'mensaje', 'warning', 5)
// .then(resultado => {
//     console.log(resultado); // Se ejecutará en caso de pago exitoso
//     // Aquí podríamos realizar acciones adicionales, como actualizar la base de datos, enviar un recibo por correo, etc.
// })
// .catch(error => {
//     console.error(error.message); // Se ejecutará en caso de pago fallido
//     // Aquí podemos ofrecer al usuario la opción de intentar nuevamente o mostrar un mensaje de error
// });

const sidebarSelecMenu = () => {
    let URLactual = window.location.href;
    let componente_ul = $('#sidebar-menu a[href="'+URLactual+'"]').closest('ul.sub-nav');
    let ul_id = componente_ul.attr('id');
    if(componente_ul.length > 0){
        componente_ul.addClass('show');
        $('#sidebar-menu a[href="#'+ul_id+'"].nav-link').addClass('active');
        $('#sidebar-menu a[href="'+URLactual+'"]').addClass('active');
    }else{
        let aLink = $('#sidebar-menu a[href="'+URLactual+'"]').addClass('active');
    }

}
