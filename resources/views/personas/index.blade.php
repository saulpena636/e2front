@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de personas
                        <a href="{{route('persona.crear')}}" class="btn btn-success btn-sm float-right">Agregar persona</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success">
                            {{session('info')}}
                            </div>
                        @endif
                        <table class="table table-striped table-sm">
                            <thead class="thead-dark">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th> </th>
                            </thead>
                            <tbody>
                                @foreach($personas as $persona)
                                <tr>
                                    <td>{{$persona->id}}</td>
                                    <td>{{$persona->nombre}}</td>
                                    <td>{{$persona->apellidos}}</td>
                                    <td><a href="{{route('persona.editar', $persona->id)}}" class="btn btn-warning btn-sm">Actualizar</a>
                                    <a href="javascript:document.getElementById('delete-{{$persona->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                    <form id="delete-{{$persona->id}}" action="{{route('persona.eliminar', $persona->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection