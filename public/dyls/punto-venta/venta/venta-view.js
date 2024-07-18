class VentaView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listarProductosVentas = () => {
        let recepcion_id = $('#guardar-venta').find('[name="recepcion_id"]').val();
        let recepcion_detalle_id = $('#guardar-venta').find('[name="recepcion_detalle_id"]').val();
        let html = '';
        this.model.listarRecepcionProductosVentas(recepcion_id, recepcion_detalle_id).then((respuesta) => {
            $.each(respuesta.productos, function (index, element) {
                html +='<tr key="'+element.id+'">'+
                '<td data-section="descripcion">'+
                    '<h6 class="mb-0">'+element.producto.codigo+'</h6>'+
                    '<p class="mb-0">'+element.producto.descripcion+'</p>'+
                '</td>'+
                '<td data-section="cantidad"> <input type="number" class="form-control form-control-sm text-center cantidad-producto" value="'+element.cantidad+'"></td>'+
                '<td data-section="precio"><span data-seleccion="precio">'+(element.precio).toFixed(2)+'</span></td>'+
                '<td data-section="sub-total" class="text-end"><span data-seleccion="sub-total">'+(element.cantidad * element.precio).toFixed(2)+'</span></td>'+
                '<td data-section="accion">zx</td>'+
            '</tr>';
            });

            $('#poductos-ventas').find('tbody').append(html);
            this.sumarCostos();
        }).fail((respuesta) => {
            console.log(respuesta);
        }).always(() => {
        });
    }

    eventos = () => {

        $('[name="producto_id"]').change((e) => {
            e.preventDefault();
            let id = $(e.currentTarget).val();
            let html = '';
            let tr_select = $('#poductos-ventas').find('tbody').find('tr[key="'+id+'"]');
            let data = $('#guardar-venta').serialize();
            // if(tr_select.length==0){
                this.model.recepcionProductosVentas(data).then((respuesta) => {
                    if(respuesta.tipo===1){

                        html ='<tr key="'+respuesta.producto.id+'">'+
                            '<td data-section="descripcion">'+
                                '<h6 class="mb-0">'+respuesta.producto.producto.codigo+'</h6>'+
                                '<p class="mb-0">'+respuesta.producto.producto.descripcion+'</p>'+
                            '</td>'+
                            '<td data-section="cantidad"> <input type="number" class="form-control form-control-sm text-center cantidad-producto" name="cantidad[]" value="'+respuesta.producto.cantidad+'"></td>'+
                            '<td data-section="precio"><span data-seleccion="precio">'+(respuesta.producto.precio).toFixed(2)+'</span></td>'+
                            '<td data-section="sub-total" class="text-end"><span data-seleccion="sub-total">'+(respuesta.producto.precio).toFixed(2)+'</span></td>'+
                            '<td data-section="accion">zx</td>'+
                        '</tr>';
                        $('#poductos-ventas').find('tbody').append(html);
                        this.sumarCostos();
                    }else{

                        Swal.fire({
                            title: "¡Alerta!",
                            text: "El producto ya se encuentra seleccionado.",
                            icon: "warning"
                        });
                    }
                }).fail((respuesta) => {
                    console.log(respuesta);
                }).always(() => {
                });
            // }else{
            // }
        });

        $('#poductos-ventas').on("change", 'input.cantidad-producto', (e) => {
            e.preventDefault();
            let cantidad = $(e.currentTarget).val();
            let precio = $(e.currentTarget).closest('tr').find('td[data-section="precio"]').find('[data-seleccion="precio"]').text();
            let key = $(e.currentTarget).closest('tr').attr('key');
            let sub_total = parseFloat(precio) *  parseFloat(cantidad);

            $('#poductos-ventas').find('tr[key="'+key+'"]').find('td[data-section="sub-total"]').find('span[data-seleccion="sub-total"]').text(sub_total.toFixed(2));

            this.model.guardar(key,cantidad).then((respuesta) => {
                if(respuesta.tipo == 200){
                    this.sumarCostos();
                }else{
                    Swal.fire({
                        title: respuesta.titulo,
                        text: respuesta.texto,
                        icon: respuesta.icono
                    });
                    console.log(respuesta);
                }

            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });
        // function sumarCostos() {

        // }
    }

    sumarCostos = () => {
        let tabla = $('#poductos-ventas tbody tr td[data-section="sub-total"]');
        let total = 0;
        let descuento = parseFloat($('#poductos-ventas').find('tfoot').find('tr td[data-section="descuento-valor"]').text());
        let pagar = 0;
        $.each(tabla, function (index, element) {
            let sub_total = parseFloat(element.children[0].innerText);
            total = total + sub_total;

        });
        $('#poductos-ventas').find('tfoot').find('tr td[data-section="total-valor"]').text(total.toFixed(2));

        pagar = total - descuento;
        $('#poductos-ventas').find('tfoot').find('tr td[data-section="pagar-valor"]').text(pagar.toFixed(2));
    }
}



