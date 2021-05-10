@extends('admin.layout')

@section('content')
<div class="container">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session ('message')}}
        </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3>Especialidades</h3>
        </div>
        
        <div class="card-body">
            
            @if($especialidades)
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($especialidades as $especialidadesItem)
                    <tr>
                        <th scope="row">{{ $especialidadesItem->id}}</th>
                        <td>{{ $especialidadesItem->nombre}}</td>
                        <td>
                            <a href="/especialidad/{{ $especialidadesItem->id}}/edit">
                                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Editar</button>
                            </a>
                            <a href="/especialidad/{{ $especialidadesItem->id}}/medicos">
                                <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">Médicos</button>
                            </a>
                        </td>
                        <td>
                        
                        </td> 
                    </tr>
            @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <div class="form-group col-md-10">
            <div class="offset-md-5">
                <p>Si no encuentra la especialidad usted puede</p>
                <a href="{{ route('especialidad.create') }}">
                    <button class="btn btn-primary">
                        Agregar Nueva Especialidad
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection