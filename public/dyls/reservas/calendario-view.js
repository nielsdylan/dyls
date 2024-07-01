class CalendarioView {

    constructor(model) {
        this.model = model;
    }

    calendario = () => {
        let model = this.model;
        // document.addEventListener('DOMContentLoaded', function () {
            // let calendarEl = document.getElementById('calendar1');
            let calendarEl = $('#calendar1')[0];
            let calendar1 = new FullCalendar.Calendar(calendarEl, {
                selectable: true,
                plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                timeZone: "UTC",
                defaultView: "dayGridMonth",
                contentHeight: "auto",
                eventLimit: true,
                dayMaxEvents: 4,
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                },
                dateClick: function (info) {
                    $('#formulario-modal').modal('show');
                    $('#formulario-modal').find('[name="fecha_entrada"]').val(info.dateStr);
                    $('#formulario-modal').find('[name="fecha_salida"]').val(info.dateStr);
                },
                eventClick: function(info) {
                    $("#formulario-modal")[0].reset();
                    model.editar(info.event.id).then((respuesta) => {
                        console.log(respuesta);

                        $('#formulario-modal').modal('show');
                    }).fail((respuesta) => {
                        console.log(respuesta);
                    }).always(() => {
                    });
                },
                events:route("dyls.reservas.eventos")
          });
          calendar1.render();
        // });
    }

    eventos = () => {

        $('#guardar-modal').submit((e) => {
            e.preventDefault();

            let data = $(e.currentTarget).serialize();

            this.model.guardar(data).then((respuesta) => {
                console.log(respuesta);
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });

        $('[name="recepcion_id"]').change((e) => {
            // e.preventDefault();

            let id = $(e.currentTarget).val();
            let habitacion_id = $(e.currentTarget).find('option[value="'+id+'"]').attr('data-habitacion');

            this.model.habitacion(id).then((respuesta) => {
                $('[name="saldo"]').val(respuesta.precio);
                $('[name="total"]').val(respuesta.precio);
                $('#guardar-modal #saldo').val(respuesta.precio);
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });

        $('#guardar-modal [name="adelanto"]').change(function (e) {
            e.preventDefault();
            let adelanto = $(e.currentTarget).val();
            let total = $('#guardar-modal [name="total"]').val();
            let saldo = total-adelanto;
            $('#guardar-modal [name="saldo"]').val(saldo);
            $('#guardar-modal #saldo').val(saldo);
        });
        
        $('.agregar-cliente').click((e) => {
            // e.preventDefault();
            $('#formulario-cliente-modal').modal('show');

        });
        $('#guardar-cliente-modal').submit((e) => {
            e.preventDefault();

            let data = $(e.currentTarget).serialize();

            this.model.guardarCliente(data).then((respuesta) => {
                console.log(respuesta);
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });

        $('.click-toast').click((e) => { 
            e.preventDefault();

            $('#toast-notificacion').removeClass('show');
            $('#toast-notificacion').addClass('hide');
            $('#toast-notificacion').removeAttr('style');


            $('#toast-notificacion').removeClass('hide');
            $('#toast-notificacion').addClass('show');
            // $('#toast-notificacion').slideUp( 300 ).fadeIn( 400 );
            $('#toast-notificacion').delay(5000).fadeOut(200);

            setTimeout(function () {
                $('#toast-notificacion').removeClass('show');
                $('#toast-notificacion').addClass('hide');
                $('#toast-notificacion').removeAttr('style');
                
            }, 6000);
        });
    }
}



