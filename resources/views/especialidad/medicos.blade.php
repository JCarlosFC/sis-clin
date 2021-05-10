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
            <h3>{{$especialidad->nombre}}</h3>
        </div>
        
        <div class="card-body">
            <div class="form-group col-md-8">
                <nav class="navbar navbar-light bg-light float-right">
                    <form class="form-inline" method="POST" action="{{ url('especialidad/agregarmedico')}}/{{$especialidad->id}}" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id_medico" id="id_medico" value="0">
                        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Seleccione un médico">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Asignar Médico</button>
                    </form>
                </nav>
                
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Código Médico</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($especialidad->medicos as $medicosItem)
                    <tr>
                        <th scope="row">{{ $medicosItem->id }}</th>
                        <td>{{ $medicosItem->nombres }}</td>
                        <td>{{ $medicosItem->apellido_paterno }}</td>
                        <td>{{ $medicosItem->apellido_materno }}</td>
                        <td>{{ $medicosItem->codigo_medico }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#search').autocomplete({
            source: function(request, response){
                $.ajax({
                    url:"{{route('search.medicos')}}",
                    dataType : 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        response(data);
                    },
                });
            },
            select: function( event, ui ) {
                $('#id_medico').val(ui.item.id)
                return true;
            }
        });
    });
</script>
@endsection