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
            let model = this.model;
            this.model.guardarCliente(data).then((respuesta) => {
                // console.log(respuesta);
                alertas(respuesta.titulo, respuesta.mensaje, respuesta.tipo, 5);
                $('#formulario-cliente-modal').modal('hide');

                model.listarCombo().then((respuesta) => {
                    let option = '<option value="">Seleccione...</option>';
                    $.each(respuesta, function (index, elemen) {
                        option += '<option value="'+elemen.id+'">'+elemen.persona.nro_documento+'</option>';
                    });
                    $('#formulario-modal [name="cliente_id"]').html(option);
                }).fail((respuesta) => {
                    console.log(respuesta);
                }).always(() => {
                });
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });

        $('.click-toast').click((e) => {
            e.preventDefault();

            // alertas('titulo', 'mensaje', 'warning', 5)
            // .then(result => console.log("Tiradas correctas: ", result.value))
            // .catch(err => console.error("Ha ocurrido algo: ", err.message));
            alertas('titulo', 'mensaje', 'warning', 5);



        });
    }
}



