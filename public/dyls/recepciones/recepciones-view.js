class RecepcionesView {

    constructor(model) {
        this.model = model;
    }

    /**
     * Listar mediante DataTables
     */
    // listar = () => {
    //     const $tabla = $('#tabla-data').DataTable({
    //         destroy: true,
    //         // dom: 'Bfrtip',
    //         autoWidth: false,
    //         responsive: true,
    //         pageLength: 10,
    //         language: idioma,
    //         serverSide: true,
    //         processing: true,
    //         // buttons: ['copy', 'excel', 'pdf', 'colvis'],
    //         // pagingType: 'full_numbers',
    //         initComplete: function (settings, json) {
    //             // const $filter = $('#tabla-data_filter');
    //             // const $input = $filter.find('input');
    //             // $filter.append('<button id="btnBuscar" class="btn btn-default btn-sm" type="button" style="border-bottom-left-radius: 0px;border-top-left-radius: 0px;"><i class="fa fa-search"></i></button>');
    //             // $input.addClass('form-control-sm');
    //             // $input.attr('style','border-bottom-right-radius: 0px;border-top-right-radius: 0px;padding-top: 3px;');

    //             // $input.off();
    //             // $input.on('keyup', (e) => {
    //             //     if (e.key == 'Enter') {
    //             //         $('#btnBuscar').trigger('click');
    //             //     }
    //             // });
    //             // $('#btnBuscar').on('click', (e) => {
    //             //     $tabla.search($input.val()).draw();
    //             // });
    //             // $('#tabla-data_length label').addClass('select2-sm');
    //             // //______Select2
    //             // $('[name="tabla-data_length"]').select2({
    //             //     minimumResultsForSearch: Infinity
    //             // });
    //             // const $paginate = $('#tabla-data_paginate');
    //             // $paginate.find('ul.pagination').addClass('pagination-sm');

    //         },
    //         drawCallback: function (settings) {
    //             $('#tabla-data_filter input').prop('disabled', false);
    //             $('#btnBuscar').html('<i class="fa fa-search"></i>').prop('disabled', false);
    //             $('#tabla-data_filter input').trigger('focus');
    //             const $paginate = $('#tabla-data_paginate');
    //             $paginate.find('ul.pagination').addClass('pagination-sm');

    //         },
    //         order: [[0, 'desc']],
    //         ajax: {
    //             url: route('dyls.configuraciones.tarifas.listar'),
    //             method: 'POST',
    //             // headers: {'X-CSRF-TOKEN': token},
    //             dataType: "JSON",
    //             data: {_token:token},
    //             // data: JSON.parse(localStorage.getItem('filtros'))
    //             // data: filtros
    //         },
    //         columns: [
    //             {data: 'id', className: 'text-center'},
    //             {data: 'nombre', className: 'text-center'},
    //             {data: 'estado_span', className: 'text-center'},
    //             {data: 'accion', orderable: false, searchable: false, className: 'text-center'}
    //         ]
    //     });
    //     $tabla.on('search.dt', function() {
    //         $('#tabla-data_filter input').attr('disabled', true);
    //         $('#btnBuscar').html('<i class="fa fa-clock" aria-hidden="true"></i>').prop('disabled', true);
    //     });
    //     $tabla.on('init.dt', function(e, settings, processing) {
    //         // $('#tabla-data_length label').addClass('select2-sm');
    //         // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
    //     });
    //     $tabla.on('processing.dt', function(e, settings, processing) {
    //         if (processing) {
    //             // $(e.currentTarget).LoadingOverlay('show', { imageAutoResize: true, progress: true, imageColor: '#3c8dbc' });
    //         } else {
    //             // $(e.currentTarget).LoadingOverlay("hide", true);
    //         }
    //     });
    //     // $tabla.buttons().container().appendTo('#tabla-data_wrapper .col-md-6:eq(0)');
    // }

    eventos = () => {

        // $('.recepcion').click((e) => {
        //     e.preventDefault();
        //     console.log('click');
            // $("#guardar-modal")[0].reset();
            // $('#nivel-modal').modal('show');
            // $('#nivel-modal').find('[name="id"]').val(0);
            // $('#nivel-modal').find('#nivel-titulo').text('Nueva Tarifa');

        // });
        $('#guardar').submit((e) => {
            e.preventDefault();

            let data = $(e.currentTarget).serialize();
            let model = this.model;
            Swal.fire({

                title: '¿Esta seguro de?',
                text: '¿Estas seguro de guardar el registro?',
                icon: 'question',
                // iconColor:'#87adbd',
                // showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,


                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: async (login) => {
                    return model.guardar(data).then((respuesta) => {
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
                        location.reload();
                    })
                  console.log(result);
                }
            });


            // model.guardar(data).then((respuesta) => {
            //     Swal.fire({
            //         title: respuesta.titulo,
            //         text: respuesta.mensaje,
            //         icon: respuesta.tipo,
            //         showCancelButton: false,
            //         confirmButtonColor: '#3085d6',
            //         confirmButtonText: 'Aceptar',
            //         allowOutsideClick: false,
            //     }).then((resultado) => {
            //         console.log(resultado);
            //     })

            // }).fail((respuesta) => {
            //     console.log(respuesta);
            // }).always(() => {
            // });
        });
        $('#guardar [name="adelanto"]').change(function (e) {
            e.preventDefault();
            let adelanto = $(e.currentTarget).val();
            let total = $('#guardar [name="total"]').val();
            let saldo = total-adelanto;
            $('#guardar [name="saldo"]').val(saldo);
            $('#guardar #saldo').val(saldo);
            console.log(total-adelanto);
        });


        // $('#tabla-data').on("click", 'a.editar', (e) => {
        //     e.preventDefault();
        //     $("#guardar-modal")[0].reset();
        //     let id = $(e.currentTarget).attr('data-id');
        //     this.model.editar(id).then((respuesta) => {
        //         $('#nivel-modal').find('#nivel-titulo').text('Editar Tarifa');
        //         $('#nivel-modal').find('[name="id"]').val(respuesta.id);
        //         $('#nivel-modal').find('[name="nombre"]').val(respuesta.nombre);
        //         $('#nivel-modal').modal('show');
        //         $('#tabla-data').DataTable().ajax.reload();
        //     }).fail((respuesta) => {
        //         console.log(respuesta);
        //     }).always(() => {
        //     });
        // });


        // $('#tabla-data').on("click", 'a.eliminar', (e) => {
        //     e.preventDefault();
        //     let id = $(e.currentTarget).attr('data-id');
        //     let modelo = this.model;
        //     Swal.fire({
        //         title: 'Eliminar',
        //         text: "¿Está seguro de eliminar?",
        //         icon: 'question',
        //         showCancelButton: true,
        //         confirmButtonText: 'Si, eliminar',
        //         cancelButtonText: 'No, cancelar',
        //         showLoaderOnConfirm: true,
        //         preConfirm: (login) => {
        //             return modelo.eliminar(id).then((respuesta) => {
        //                 return respuesta;
        //             }).fail((respuesta) => {
        //                 // return respuesta;
        //             }).always(() => {
        //             });
        //         },
        //       }).then((result) => {

        //         if (result.isConfirmed) {

        //             Swal.fire({
        //                 title: result.value.titulo,
        //                 text: result.value.mensaje,
        //                 icon: result.value.tipo,
        //                 showCancelButton: false,
        //                 confirmButtonColor: '#3085d6',
        //                 confirmButtonText: 'Aceptar',
        //                 allowOutsideClick: false,
        //             }).then((resultado) => {
        //                 if (resultado.isConfirmed) {
        //                     $('#tabla-data').DataTable().ajax.reload();
        //                 }
        //             })
        //         }

        //     })
        // });
    }
}



