class VentaView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    listar = () => {
        const $tabla = $('#tabla-data').DataTable({
            destroy: true,
            // dom: 'Bfrtip',
            autoWidth: false,
            responsive: true,
            pageLength: 10,
            language: idioma,
            serverSide: true,
            processing: true,
            // buttons: ['copy', 'excel', 'pdf', 'colvis'],
            // pagingType: 'full_numbers',
            initComplete: function (settings, json) {
                // const $filter = $('#tabla-data_filter');
                // const $input = $filter.find('input');
                // $filter.append('<button id="btnBuscar" class="btn btn-default btn-sm" type="button" style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;"><i class="fa fa-search"></i></button>');
                // $input.addClass('form-control-sm');
                // $input.attr('style','border-bottom-right-radius: 0px;border-top-right-radius: 0px;padding-top: 3px;');

                // $input.off();
                // $input.on('keyup', (e) => {
                //     if (e.key == 'Enter') {
                //         $('#btnBuscar').trigger('click');
                //     }
                // });
                // $('#btnBuscar').on('click', (e) => {
                //     $tabla.search($input.val()).draw();
                // });
                // $('#tabla-data_length label').addClass('select2-sm');
                // //______Select2
                // $('[name="tabla-data_length"]').select2({
                //     minimumResultsForSearch: Infinity
                // });
                // const $paginate = $('#tabla-data_paginate');
                // $paginate.find('ul.pagination').addClass('pagination-sm');

            },
            drawCallback: function (settings) {
                $('#tabla-data_filter input').prop('disabled', false);
                $('#btnBuscar').html('<i class="fa fa-search"></i>').prop('disabled', false);
                $('#tabla-data_filter input').trigger('focus');
                const $paginate = $('#tabla-data_paginate');
                $paginate.find('ul.pagination').addClass('pagination-sm');

            },
            order: [[0, 'desc']],
            ajax: {
                url: route('dyls.punto-venta.venta.listar'),
                method: 'POST',
                // headers: {'X-CSRF-TOKEN': token},
                dataType: "JSON",
                data: {_token:token},
                // data: JSON.parse(localStorage.getItem('filtros'))
                // data: filtros
            },
            columns: [
                {data: 'id', className: 'text-center'},
                {data: 'codigo', className: 'text-center'},
                {data: 'descripcion', className: 'text-left'},
                {data: 'stock', className: 'text-center'},
                {data: 'precio', className: 'text-center'},
                {data: 'jerarquia', className: 'text-center'},
                {data: 'estado_span', className: 'text-center'},
                {data: 'accion', orderable: false, searchable: false, className: 'text-center'}
            ]
        });
        $tabla.on('search.dt', function() {
            $('#tabla-data_filter input').attr('disabled', true);
            $('#btnBuscar').html('<i class="fa fa-clock" aria-hidden="true"></i>').prop('disabled', true);
        });
        $tabla.on('init.dt', function(e, settings, processing) {
            // $('#tabla-data_length label').addClass('select2-sm');
            // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
        });
        $tabla.on('processing.dt', function(e, settings, processing) {
            if (processing) {
                // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
            } else {
                // $(e.currentTarget).LoadingOverlay("hide", true);
            }
        });
        // $tabla.buttons().container().appendTo('#tabla-data_wrapper .col-md-6:eq(0)');
    }

    eventos = () => {

        $('[name="producto_id"]').change((e) => {
            e.preventDefault();
            let id = $(e.currentTarget).val();
            let html = '';
            let tr_select = $('#poductos-ventas').find('tbody').find('tr[key="'+id+'"]');

            if(tr_select.length==0){
                this.model.obtenerPoducto(id).then((respuesta) => {
                    console.log(respuesta);
                    html ='<tr key="'+respuesta.id+'">'+
                        '<td>'+
                            '<h6 class="mb-0">'+respuesta.codigo+'</h6>'+
                            '<p class="mb-0">'+respuesta.descripcion+'</p>'+
                        '</td>'+
                        '<td> <input type="number" class="form-control form-control-sm text-center" value="1"></td>'+
                        '<td>'+respuesta.precio+'</td>'+
                        '<td class="text-end">'+respuesta.precio+'</td>'+
                        '<td>zx</td>'+
                    '</tr>';
                    $('#poductos-ventas').find('tbody').append(html);
                }).fail((respuesta) => {
                    console.log(respuesta);
                }).always(() => {
                });
            }else{
                Swal.fire({
                    title: "¡Alerta!",
                    text: "El producto ya se encuentra seleccionado.",
                    icon: "warning"
                });
            }
        });

    }
}



