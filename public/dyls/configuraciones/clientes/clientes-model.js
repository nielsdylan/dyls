class ClientesModel {

    constructor(token) {
        this.token = token;
    }

    guardar = (data) => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.guardar"),
            type: "POST",
            dataType: "JSON",
            // processData: false,
            // contentType: false,
            data: data,
        });
    }
    editar = (id) => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.editar", {id: id}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    eliminar = (id) => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.eliminar", {id: id}),
            type: "PUT",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
    buscadorNumero = (numero) => {
        return $.ajax({
            url: route("dyls.configuraciones.clientes.buscador-numero", {numero: numero}),
            type: "GET",
            dataType: "JSON",
            data: { _token: this.token },
        });
    }
}
