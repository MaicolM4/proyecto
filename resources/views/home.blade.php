@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <a href="{{ route('vehiculo.index') }}" class="btn btn-info btnblock" >Vehículo</a>
                    @auth
                    <a href="{{ route('register') }}" class="btn btn-info btnblock">Register</a>
                    @endauth
                    
                    </br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
