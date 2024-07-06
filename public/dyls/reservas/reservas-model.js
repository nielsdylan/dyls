class ReservasModel {

    constructor(token) {
        this.token = token;
    }

    guardar = (data) => {
        return $.ajax({
            url: route("dyls.reservas.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }
    editar = (id) => {
        return $.ajax({
            url: route("dyls.reservas.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    eliminar = (id) => {
        return $.ajax({
            url: route("dyls.reservas.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }

    habitacion = (id) => {
        return $.ajax({
            url: route("dyls.configuraciones.habitaciones.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: { _token: this.token },
        });
    }

    guardarCliente = (data) => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }

    listarCombo = () => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.listar-combo"),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
}
