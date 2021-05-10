@extends('medico.medico')

@section('busqueda')
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">código</th>
                <th scope="col" colspan="2">opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medico as $medicoItem)
                <tr>
                    <th scope="row">{{ $medicoItem->id}}</th>
                    <td>{{ $medicoItem->nombres}}</td>
                    <td>{{ $medicoItem->apellido_paterno }}</td>
                    <td>{{ $medicoItem->apellido_materno }}</td>
                    <td>{{ $medicoItem->codigo_medico }}</td>
                    <td><a href="/medico/{{ $medicoItem->id }}/edit"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">editar</button></a></td>   
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection