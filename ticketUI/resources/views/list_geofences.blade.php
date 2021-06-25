@extends('layouts.app')

@section('content')

<div class="wrapper">

    <div class="main-panel" onload="loadGeofences()">
        <button onclick="loadGeofences()">Ver geocercas</button>
        <div class="container">
            <table id="table" data-height="460">
                <thead>
                    <tr>
                        <th data-field="id"></th>
                        <th data-field="nombre"></th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



<script>
    var mydata;
    nombresCount = 0;

    function closeNav() {
        document.getElementById('togglerBtn').click()
    }

    function loadGeofences() {


        $.get('mapaList', function(data) {
            $('#table').bootstrapTable({
                data: data
            });
            t = $('#table tbody tr');
            total = t.length;
            var row;
            var td;
            var a;
            var i;
            console.log(total)
            for (i = 0; i < total; i++) {
                row = $('#table tbody tr')[i];
                console.log(row);
                a = document.createElement('a')
                a.href = '/edit_geocerca/' + row.cells[0].textContent;
                a.text = 'Editar';
                row.append(a);
            }
        })
    }

</script>
<style>
    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

<div id="sizer" onload="loadGeofences()">
    <div class="d-block d-sm-none d-md-none d-lg-none d-xl-none" data-size="xs"></div>
    <div class="d-none d-sm-block d-md-none d-lg-none d-xl-none" data-size="sm"></div>
    <div class="d-none d-sm-none d-md-block d-lg-none d-xl-none" data-size="md"></div>
    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-none" data-size="lg"></div>
    <div class="d-none d-sm-none d-md-none d-lg-none d-xl-block" data-size="xl"></div>
</div>


@endsection