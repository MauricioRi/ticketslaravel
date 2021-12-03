@extends('layouts/contentLayoutMaster')

@section('title', 'Inicio')

@section('content')

<!-- Page layout -->
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Egresos</h4>
  </div>
  <div class="card-body">
    <table id="table" data-height="460" class="table table-striped table-blue" data-show-columns="true">
      <thead>
        <tr>
          <th data-field="id">ID</th>
          <th data-field="name">Nombre</th>

        </tr>
      </thead>
    </table>
  </div>
</div>
<!--/ Page layout -->
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
        field: "url",
        title: "Nombre"
      },

    ]

    table.bootstrapTable()
    table.bootstrapTable('refreshOptions', {
      columns: columns,
      url: "get-eventos",
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
    setTimeout(createBSTable, 5000);
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
    },
    formatLoadingMessage: function() {
      return '<b>This is a custom loading message...</b>';
    }
  })


  createBSTable();
</script>
@endsection