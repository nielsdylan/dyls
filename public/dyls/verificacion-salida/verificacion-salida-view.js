class VerificacionSalidaView {

    constructor(model) {
        this.model = model;
    }
    sumarCostos = () => {
        let tabla = $('#data-servicios tbody tr td[data-section="sub-total"]');
        let total = 0;
        // let descuento = parseFloat($('#poductos-ventas').find('tfoot').find('tr td[data-section="descuento-valor"]').text());
        let pagar = 0;
        $.each(tabla, function (index, element) {
            // console.log(element.children[0]);
            // console.log(element.children);

            let sub_total = parseFloat(element.children[1].innerText);
            total = total + sub_total;

        });
        $('#data-servicios').find('tfoot').find('tr td[data-section="total-valor"]').text(total.toFixed(2));

        let por_pagar = parseFloat($('#table-costo-alojamiento tbody tr td[data-section="por-pagar"]')[0].children[1].innerText);
        pagar = total + por_pagar;
        $('#data-servicios').find('tfoot').find('tr td[data-section="total-pagar"]').text(pagar.toFixed(2));
    }


    eventos = () => {

        $('[data-action="culminar-limpiar"]').click((e) => {
            e.preventDefault();
            let tipo_pago               = $('select[name="tipo_pago_id"]').val();
            let habitacion_id           = $('[name="habitacion_id"]').val();
            let cliente_id              = $('[name="cliente_id"]').val();
            let recepcion_detalle_id    = $('[name="recepcion_detalle_id"]').val();
            let mora_penalidad    = $('[name="mora-penalidad"]').val();
            let model = this.model;

            if(tipo_pago){

                Swal.fire({

                    title: 'Registrar',
                    text: '¿Estas seguro de guardar el registro?',
                    icon: 'question',
                    // iconColor:'#87adbd',
                    // showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false,


                    showCancelButton: true,
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        return model.guardar(tipo_pago,habitacion_id,cliente_id,recepcion_detalle_id,mora_penalidad).then((respuesta) => {
                            return respuesta;
                        }).fail((respuesta) => {
                            console.log(respuesta);
                        }).always(() => {
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: result.value.titulo,
                            text: result.value.mensaje,
                            icon: result.value.tipo,
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false,
                        }).then((resultado) => {
                            // location.reload();
                        })
                    console.log(result);
                    }
                });
            }else{
                Swal.fire({
                    title: 'Alerta',
                    text: 'Seleccione el tipo de pago',
                    icon: 'warning'
                });
            }

        });
        $('[data-action="penalidad"]').change((e) => {
            e.preventDefault();
            let mora   = parseFloat($(e.currentTarget).val());
            let costo_habitacion = parseFloat($('#table-costo-alojamiento tbody tr th[data-section="costo-habitacion"]')[0].children[1].innerText);
            let dias = parseFloat($('#table-costo-alojamiento tbody tr td[data-section="total-dias"]')[0].children[1].innerText);
            let adelanto = parseFloat($('#table-costo-alojamiento tbody tr td[data-section="adelanto"]')[0].children[1].innerText);
            if(mora){
                let total = ((costo_habitacion * dias) - adelanto) + mora;
                $('#table-costo-alojamiento tbody tr td[data-section="por-pagar"] label').text(total.toFixed(2));
            }else{
                let total = ((costo_habitacion * dias) - adelanto);
                $('#table-costo-alojamiento tbody tr td[data-section="por-pagar"] label').text(total.toFixed(2));
            }
            this.sumarCostos();
        });
    }
}



