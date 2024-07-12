class ProductoModel {

    constructor(token) {
        this.token = token;
    }

    guardar = (data) => {
        return $.ajax({
            url: route("dyls.punto-venta.productos.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }
    editar = (id) => {
        return $.ajax({
            url: route("dyls.punto-venta.productos.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    eliminar = (id) => {
        return $.ajax({
            url: route("dyls.punto-venta.productos.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
