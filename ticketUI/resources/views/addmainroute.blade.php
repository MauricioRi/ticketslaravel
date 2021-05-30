@extends('layouts.app')

@section('content')
    <script>
        window.onload = function() {
            var button = document.getElementById("enter");
            var input = document.getElementById("userinput");
            var ul = document.getElementById("lista");


            button.onclick = function() {
                if (input.value != '') {
                    var li = document.createElement("li");
                    li.appendChild(document.createTextNode(input.value));
                    li.className = "list-group-item";
                    ul.appendChild(li);
                    input.value = '';
                }

            };
        }

    </script>
    <div class="main-panel">
        <form method="POST" action="{{ route('crear') }}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Button</button>
                </div>
            </div>
        </form>
    </div>





@endsection
