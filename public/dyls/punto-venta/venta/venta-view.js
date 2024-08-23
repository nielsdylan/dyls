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
                console.log(element);

                html +='<tr key="'+element.id+'">'+
                '<td data-section="descripcion">'+
                    '<h6 class="mb-0">'+element.producto.codigo+'</h6>'+
                    '<p class="mb-0">'+element.producto.descripcion+'</p>'+
                '</td>'+
                '<td data-section="cantidad"> <input type="number" class="form-control form-control-sm text-center cantidad-producto" value="'+element.cantidad+'"></td>'+
                '<td data-section="precio"><span data-seleccion="precio">'+(element.precio).toFixed(2)+'</span></td>'+
                '<td data-section="pagar" >'+
                    '<div class="form-group">'+
                        '<div class="form-check d-block">'+
                            '<input class="form-check-input" type="radio" name="pagar'+element.id+'" value="1" data-action="pagar" data-id="'+element.id+'" '+(element.pagar_id==1?'checked':'')+' />'+
                            '<label class="form-check-label" >Ahora</label>'+
                        '</div>'+
                        '<div class="form-check d-block">'+
                            '<input class="form-check-input" type="radio" name="pagar'+element.id+'" value="2" data-action="pagar" data-id="'+element.id+'" '+(element.pagar_id==2?'checked':'')+'/>'+
                            '<label class="form-check-label">Despues</label>'+
                        '</div>'+
                    '</div>'+
                '</td>'+
                '<td data-section="sub-total" class="text-end"><span data-seleccion="sub-total">'+(element.cantidad * element.precio).toFixed(2)+'</span></td>'+

                '<td data-section="accion" class="text-center">'+
                    '<div class="flex align-items-center list-user-action">'+
                        '<button class="btn btn-icon btn-outline-danger mt-2" href="#" data-id="'+element.id+'" data-action="eliminar">'+
                            '<span class="btn-inner">'+
                                '<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">'+
                                    '<path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                ' <path d="M20.708 6.23975H3.75" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                    '<path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                '</svg>'+
                            '</span>'+
                        '</button>'+
                    '</div>'+
                '</td>'+
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
                            '<td data-section="pagar" >'+
                                '<div class="form-group">'+
                                    '<div class="form-check d-block">'+
                                        '<input class="form-check-input" type="radio" name="pagar'+respuesta.producto.id+'" value="1" data-action="pagar" data-id="'+respuesta.producto.id+'" checked/>'+
                                        '<label class="form-check-label" >Ahora</label>'+
                                    '</div>'+
                                    '<div class="form-check d-block">'+
                                        '<input class="form-check-input" type="radio" name="pagar'+respuesta.producto.id+'" value="2" data-action="pagar" data-id="'+respuesta.producto.id+'" />'+
                                        '<label class="form-check-label">Despues</label>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                            '<td data-section="sub-total" class="text-end"><span data-seleccion="sub-total">'+(respuesta.producto.precio).toFixed(2)+'</span></td>'+

                            '<td data-section="accion" class="text-center">'+
                                '<div class="flex align-items-center list-user-action">'+
                                    '<button class="btn btn-icon btn-outline-danger mt-2" href="#" data-id="'+respuesta.producto.id+'" data-action="eliminar">'+
                                        '<span class="btn-inner">'+
                                            '<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">'+
                                                '<path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                            ' <path d="M20.708 6.23975H3.75" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                                '<path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" strokeWidth={1.5} strokeLinecap="round" strokeLinejoin="round" />'+
                                            '</svg>'+
                                        '</span>'+
                                    '</button>'+
                                '</div>'+
                            '</td>'+
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
        $('#poductos-ventas').on("click", 'button[data-action="eliminar"]', (e) => {
            e.preventDefault();
            let key = $(e.currentTarget).attr('data-id');
            this.model.eliminar(key).then((respuesta) => {

                console.log(respuesta);
                if(respuesta.tipo == 200){
                    $('#poductos-ventas tbody tr[key="'+key+'"]').remove();
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
        $('#poductos-ventas').on("click", 'input[data-action="pagar"]', (e) => {
            // e.preventDefault();
            let id = $(e.currentTarget).attr('data-id');
            let pago_id = $(e.currentTarget).val();
            this.model.guardarPago(id,pago_id).then((respuesta) => {

                console.log(respuesta);

            }).fail((respuesta) => {
                console.log(respuesta);
            }).always(() => {
            });
        });
    }

    sumarCostos = () => {
        let tabla = $('#poductos-ventas tbody tr td[data-section="sub-total"]');
        let total = 0;
        // let descuento = parseFloat($('#poductos-ventas').find('tfoot').find('tr td[data-section="descuento-valor"]').text());
        let pagar = 0;
        $.each(tabla, function (index, element) {
            let sub_total = parseFloat(element.children[0].innerText);
            total = total + sub_total;

        });
        $('#poductos-ventas').find('tfoot').find('tr td[data-section="total-valor"]').text(total.toFixed(2));

        // pagar = total - descuento;
        pagar = total;
        $('#poductos-ventas').find('tfoot').find('tr td[data-section="pagar-valor"]').text(pagar.toFixed(2));
    }
}



