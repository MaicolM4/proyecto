@extends('layouts.layout')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Editar Ingreso de vehiculo</h3>
            </div>
            <div class="panel-body">
                <div class="table-container">
                    <form method="POST" action="{{ route('ingresoV.update',$ingreso->id) }}" role="form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    Placa_id:
                                    <input type="text" name="vehiculo_id" id="vehiculo_id" class="form-control inputsm" value="{{$ingreso->vehiculo_id}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    Fecha:
                                    <input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control inputsm" value="{{$ingreso->fecha_ingreso}}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                Estado:
                                <input type="text" name="estado" id="estado" class="form-control inputsm" value="{{$ingreso->estado}}">
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                        <a href="{{ route('ingresoV.index') }}" class="btn btn-info btnblock">Atrás</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection