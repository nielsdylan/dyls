class CalendarioView {
     
    constructor(model) {
        this.model = model;
        this.calendario_evento;
    }

    calendario = () => {
        let model = this.model;
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
                $("#guardar-modal")[0].reset();
                $('#formulario-modal').modal('show');
                $("#guardar-modal").find('[name="cliente_id"] option').removeAttr('selected');
                $("#guardar-modal").find('[name="recepcion_id"] option').removeAttr('selected');
                $("#guardar-modal").find('[name="saldo"]').val(0);
                $("#guardar-modal").find('[name="total"]').val(0);
                $("#guardar-modal").find('[name="id"]').val(0);


                $('#formulario-modal').find('[name="fecha_entrada"]').val(info.dateStr);
                $('#formulario-modal').find('[name="fecha_salida"]').val(info.dateStr);

                $('[data-action="cancelar-reserva"]').addClass('d-none');
            },
            eventClick: function(info) {
                $("#guardar-modal")[0].reset();
                model.editar(info.event.id).then((respuesta) => {
                    $("#guardar-modal").find('[name="cliente_id"] option[value="'+respuesta.recepcion_detalle.cliente_id+'"]').attr('selected','true');
                    $("#guardar-modal").find('[name="recepcion_id"] option[value="'+respuesta.recepcion_detalle.recepcion_id+'"]').attr('selected','true');

                    $("#guardar-modal").find('[name="fecha_entrada"]').val(respuesta.recepcion_detalle.fecha_entrada);
                    $("#guardar-modal").find('[name="fecha_salida"]').val(respuesta.recepcion_detalle.fecha_salida);
                    $("#guardar-modal").find('[name="hora_entrada"]').val(respuesta.recepcion_detalle.hora_entrada);
                    $("#guardar-modal").find('[name="hora_salida"]').val(respuesta.recepcion_detalle.hora_salida);

                    $("#guardar-modal").find('[name="adelanto"]').val(respuesta.recepcion_detalle.adelanto);
                    $("#guardar-modal").find('[name="saldo"]').val(respuesta.recepcion_detalle.saldo);
                    $("#guardar-modal").find('[name="total"]').val(respuesta.recepcion_detalle.total);
                    $("#guardar-modal").find('#saldo').val(respuesta.recepcion_detalle.saldo);
                    $("#guardar-modal").find('[name="id"]').val(respuesta.recepcion.id);

                    $('[data-action="cancelar-reserva"]').removeClass('d-none');

                    $('#formulario-modal').modal('show');
                }).fail((respuesta) => {
                    console.log(respuesta);
                }).always(() => {
                });
            },
            events:route("dyls.reservas.eventos")
        });
        this.calendario_evento = calendar1;
        calendar1.render();
    }

    eventos = () => {
        $('#guardar-modal').submit((e) => {
            e.preventDefault();

            let data = $(e.currentTarget).serialize();
            let model = this;
            this.model.guardar(data).then((respuesta) => {
                alertas(respuesta.titulo, respuesta.mensaje, respuesta.tipo);
                $('#calendar1').html('');
                this.calendario();
                // $('#calendar1')[0].fullCalendar('refetchEvents');
                $('#formulario-modal').modal('hide');
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
            $(e.currentTarget).find('[type="submit"]').attr('disabled','true');
            this.model.guardarCliente(data).then((respuesta) => {
                // console.log(respuesta);
                alertas(respuesta.titulo, respuesta.mensaje, respuesta.tipo, 5);
                $('#formulario-cliente-modal').modal('hide');
                $(e.currentTarget).find('[type="submit"]').removeAttr('disabled');
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
        $('[data-action="cancelar-reserva"]').click((e) => {
            // e.preventDefault();
            let id = $('#guardar-modal [name="id"]').val();
            this.model.cancelarReserva(id).then((respuesta) => {
                // console.log(respuesta);
                alertas(respuesta.titulo, respuesta.mensaje, respuesta.tipo);
                $('#formulario-modal').modal('hide');
                $('#calendar1').html('');
                this.calendario();
            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });

        });
    }
}



