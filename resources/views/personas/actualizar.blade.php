@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Agregar persona
                    </div>
                    <div class="card-body">
                        <form action="{{route('persona.editado',$persona->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" value="{{$persona->nombre}}" class="form-control" name="nombre" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$persona->apellidos}}" class="form-control" name="apellidos" id="">
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Guardar</button>
                            <a href="{{route('persona.index')}}" class="btn btn-outline-danger float-right">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection