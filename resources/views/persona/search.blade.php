@extends('persona.persona')
    
@section('busqueda')

    {{$Persona}} hola
    <table class="table table-hover">
       <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Nombres</th>
             <th scope="col">Apellido Paterno</th>
             <th scope="col">Apellido Materno</th>
             <th scope="col">Número de Documento</th>
             <th scope="col" colspan="2">opciones</th>
           </tr>
        </thead>
        <tbody>
            @foreach($Persona as $PersonaItem)
               <tr>
                   <th scope="row">{{ $PersonaItem->id_persona}}</th>
                   <td>{{ $PersonaItem->nombres}}</td>
                   <td>{{ $PersonaItem->apellido_paterno }}</td>
                   <td>{{ $PersonaItem->apellido_materno }}</td>
                   <td>{{ $PersonaItem ->numero_documento }}</td>
                   <td><a href="/persona/{{ $PersonaItem->id_persona }}/edit"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">editar</button></a></td>
                   <td><img src="" alt="otro icono"></td>
               </tr>
            @endforeach
         </tbody>
    </table>   
    
@endsection