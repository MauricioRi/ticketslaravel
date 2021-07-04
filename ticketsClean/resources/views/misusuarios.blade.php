@extends('layouts.app')

@section('content')

    <div class="container">

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            
            @if (Auth::check() && Auth::user()['tipo'] == 1)
                
                <div class="container">
                    <a href="{{ URL::route('misusuarios.edit') }}" class="btn btn-outline-primary">Crear usuario</a>
                    
                    <table id="table" data-height="460">
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
        var mydata = {!! $users !!};
        $(document).ready(function() {
            $('#table').bootstrapTable({
                data: mydata
            });
            t = $('#table tbody tr');
            total = t.length;
            var row;
            var td;
            var a;
            var i;
            console.log(total)
            if(mydata.length>0){
                for (i = 0; i < total; i++) {
                row = $('#table tbody tr')[i];
                console.log(row);
                a = document.createElement('a')
                a.href = '/usuario/' + row.cells[0].textContent;
                a.text = 'Editar';
                row.append(a);
            }
            }
            
        });

        
    </script>
@endsection
