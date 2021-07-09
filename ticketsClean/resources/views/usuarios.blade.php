@extends('layouts.app')

@section('content')
<script src="{{ asset('js/funcionesUsuarios.js') }}" defer></script>
<div class="container">

    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    <div id="main">
        @if (Auth::check() && Auth::user()['tipo'] == 0)

        <div class="container">
            <a href="{{ URL::route('usuarios.edit') }}" class="btn btn-outline-primary">Crear usuario</a>

            <table id="table" data-height="460" class="table table-striped table-blue" data-show-columns="true">
                <thead>
                    <tr>
                        <th data-field="id">ID</th>
                        <th data-field="name">Nombre</th>

                    </tr>
                </thead>
            </table>

        </div>
        @endif

    </div>
</div>

<script>
    const TABLE = document.querySelector("table")
    const TABLE_ID = TABLE.getAttribute("id")
    const table = $(`#${TABLE_ID}`)
    const UNIQUE_ID = 'id'

    function createBSTable() {

        const columns = [{
                field: "id",
                title: "ID"
            },
            {
                field: "name",
                title: "Nombre"
            },
            {
                field: "tableAction",
                title: "Opciones",
                formatter: (value, row, index, field) => {
                    curID = row[UNIQUE_ID]
                    return [
                        `<button type="button" class="btn btn-primary" onclick="gotoEdit(${curID})">`,
                        `<i class="far fa-edit"></i>`,
                        `</button>`,

                        `<button type="button" class="btn btn-danger" onclick="deleteItem(${curID})">`,
                        `<i class="fas fa-trash"></i>`,
                        `</button>`,


                    ].join('')
                }
            }
        ]

        table.bootstrapTable()
        table.bootstrapTable('refreshOptions', {
            columns: columns,
            url: "listarUsuarios",
            // data: dataArray,
            height: 768,
            uniqueId: "id",
            striped: true,
            pagination: true,
            sortable: true,
            pageNumber: 1,
            pageSize: 10,
            pageList: [10, 25, 50, 100],
            search: true,
            showToggle: false,
            searchHighlight: true,

        })
        table.bootstrapTable('refresh')
    }

    $('#table').bootstrapTable({
        formatSearch: function() {
            return 'Buscar usuario'
        },
        formatShowingRows: function(pageFrom, pageTo, totalRows) {
            return 'Mostrando desde ' + pageFrom + ' hasta ' + pageTo + ' de ' + totalRows +
                ' usuarios';
        },
        formatRecordsPerPage: function(pageNumber) {
            return pageNumber +
                ' usuarios por pagina';
        }
    })

    function deleteItem(curID) {
        eliminarUsuario(curID);
        table.bootstrapTable('refresh')
    }

    function gotoEdit(curID) {
        editarUsuario(curID);
    }

    (
        () => {
            window.onload = () => {
                createBSTable()
            }
        }
    )()
</script>
@endsection