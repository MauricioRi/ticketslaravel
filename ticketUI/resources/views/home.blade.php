@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
               
                
                <div class="card-body">
                    <div class="sidebar">
                        
                    </div>
                    <div>
                        @if (Auth::user()->type==0)
                        {{ __('You are logged in!'.Auth::user()->name) }}
                        
                    @else
                    {{ __('You are logged in! but you are type '.Auth::user()->type) }}      
                    @endif
                    </div>

                    
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
