class VerificacionSalidaModel {

    constructor(token) {
        this.token = token;
    }

    guardar = (tipo_pago,habitacion_id,cliente_id,recepcion_detalle_id,mora_penalidad) => {
        return $.ajax({
            url: route("dyls.verificacion-salida.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: {
                _token: this.token,
                tipo_pago: tipo_pago,
                habitacion_id: habitacion_id,
                cliente_id: cliente_id,
                recepcion_detalle_id: recepcion_detalle_id,
                mora_penalidad:mora_penalidad
            },
        });
    }
    editar = (id) => {
        return $.ajax({
            url: route("dyls.verificacion-salida.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
