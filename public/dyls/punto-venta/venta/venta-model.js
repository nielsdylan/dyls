class VentaModel {

    constructor(token) {
        this.token = token;
    }

    // guardar = (data) => {
    //     return $.ajax({
    //         url: route("dyls.punto-venta.venta.guardar"),
    //         type: "POST",
    //         dataType: "JSON",
    //         // processData: false,
    //         // contentType: false,
    //         data: data,
    //     });
    // }
    // editar = (id) => {
    //     return $.ajax({
    //         url: route("dyls.punto-venta.venta.editar", {id: id}),
    //         type: "GET",
    //         dataType: "JSON",
    //         data: { _token: this.token },
    //     });
    // }
    eliminar = (id) => {
        return $.ajax({
            url: route("dyls.punto-venta.ventas.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

    recepcionProductosVentas = (data) => {
        return $.ajax({
            url: route("dyls.punto-venta.ventas.recepcion-productos-ventas"),
            type: "POST",
            dataType: "JSON",
            data: data,
        });
    }
    listarRecepcionProductosVentas = (recepcion_id, recepcion_detalle_id) => {
        return $.ajax({
            url: route("dyls.punto-venta.ventas.listar-recepcion-productos-ventas", {recepcion_id: recepcion_id, recepcion_detalle_id:recepcion_detalle_id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    guardar = (id, cantidad) => {
        return $.ajax({
            url: route("dyls.punto-venta.ventas.guardar"),
            type: "POST",
            dataType: "JSON",
            data: {
                _token: this.token,
                id:id,
                cantidad:cantidad
            },
        });
    }
    guardarPago = (id, pagar_id) => {
        return $.ajax({
            url: route("dyls.punto-venta.ventas.guardar-pago"),
            type: "POST",
            dataType: "JSON",
            data: {
                _token: this.token,
                id:id,
                pagar_id:pagar_id
            },
        });
    }
}
