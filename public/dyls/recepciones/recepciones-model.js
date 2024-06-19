class RecepcionesModel {

    constructor(token) {
        this.token = token;
    }

    guardar = (data) => {
        return $.ajax({
            url: route("dyls.recepcion.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }
    editar = (id) => {
        return $.ajax({
            url: route("dyls.recepcion.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    eliminar = (id) => {
        return $.ajax({
            url: route("dyls.recepcion.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

}
