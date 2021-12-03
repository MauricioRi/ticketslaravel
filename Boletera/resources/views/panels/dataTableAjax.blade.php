@section('page-script-ajax')
<script type="text/javascript">
    var dta = $('#resultsDataTableAjax');
    var aUrla = dta[0].getAttribute("actionsUrl");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        'use strict';

        $.ajax({
            success: function(response) {
                dta.DataTable({
                    ajax: '/get-eventos',
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "Ningún dato disponible en esta tabla",
                        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered: "(filtrado de un total de _MAX_ registros)",
                        search: "Buscar:",
                        infoThousands: ",",
                        loadingRecords: "Cargando...",
                        buttonText: "Imprimir",
                        paginate: {
                            first: "Primero",
                            last: "Último",
                            next: "Siguiente",
                            previous: "Anterior",
                        },
                        buttons: {
                            copyTitle: 'Copiado al portapapeles',
                            copySuccess: {
                                _: '%d registros copiados',
                                1: 'Se copio un registro'
                            }
                        },
                    },
                    dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    buttons: [{
                        extend: 'collection',
                        className: 'btn btn-outline-secondary dropdown-toggle mr-2',
                        text: feather.icons['share'].toSvg({
                            class: 'font-small-4 mr-50'
                        }) + 'Exportar',
                        buttons: [{
                                extend: 'print',
                                text: feather.icons['printer'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + 'Imprimir',
                                className: 'dropdown-item',
                                title: ''
                            },
                            {
                                extend: 'csv',
                                text: feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + 'CSV',
                                className: 'dropdown-item',
                                title: ''
                            },
                            {
                                extend: 'excel',
                                text: feather.icons['file'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + 'Excel',
                                className: 'dropdown-item',
                                title: ''
                            },
                            {
                                extend: 'pdf',
                                text: feather.icons['clipboard'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + 'PDF',
                                className: 'dropdown-item',
                                title: ''
                            },
                            {
                                extend: 'copy',
                                text: feather.icons['copy'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) + 'Copiar',
                                className: 'dropdown-item',
                                title: ''
                            }
                        ],
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function() {
                                $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                            }, 50);
                        }
                    }, ],
                    columnDefs: [{
                        // Actions
                        targets: -1,
                        title: '' + feather.icons['more-vertical'].toSvg({
                            class: 'font-small-4'
                        }),
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return (
                                '<div class="d-inline-flex">' +
                                '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
                                feather.icons['more-vertical'].toSvg({
                                    class: 'font-small-4'
                                }) +
                                '</a>' +
                                '<div class="dropdown-menu dropdown-menu-right">' +
                                '<a href="' + aUrl + '/edit/' + full[0] + '" class="dropdown-item">' +
                                feather.icons['edit'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) +
                                '</a>' +
                                '<a href="' + aUrl + '/delete/' + full[0] + '" class="dropdown-item">' +
                                feather.icons['trash-2'].toSvg({
                                    class: 'font-small-4 mr-50'
                                }) +
                                '</a>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }],
                });
                $('div.head-label').html('<h6 class="mb-0">Resultados:</h6>');
            },
            error: function(response) {
                console.log('Error');
            }
        });
    });
</script>
@endsection