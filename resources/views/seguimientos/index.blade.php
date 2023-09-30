@extends('layouts.app')
@section('content')
<div class = "container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje')}}
@endif
    <div class="d-flex justify-content-between">
        <h1>Tabla de Datos</h1>
        <a class="btn btn-outline-success" href="{{url('/seguimientos/create')}}">Crear <i class="fa-solid fa-circle-plus"></i></a>
    </div>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Asunto</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Días</th>
                <th>Fecha Próximo Seguimiento</th>
                <th>Editar | Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $seguimiento)
            <tr>
                <td>{{$seguimiento->nombres}}</td>
                <td>{{$seguimiento->apellidos}}</td>
                <td>{{$seguimiento->asunto}}</td>
                <td>{{$seguimiento->correo}}</td>
                <td>{{$seguimiento->telefono}}</td>
                <td>{{$seguimiento->fecha}}</td>
                <td>{{$seguimiento->dias}}</td>
                <td>{{$seguimiento->fecha_proximo_seguimiento}}</td>
                <td><div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-outline-warning" href="{{url('/seguimientos/'.$seguimiento->id.'/edit')}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                    <div class="col-md-6">
                        <form action="{{url('/seguimientos/'.$seguimiento->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection