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
                <h3>Reserva de Citas</h3>
            </div>
            
            <div class="card-body">
                <div class="form-group col-md-10">
                    <nav class="navbar navbar-light bg-light float-right">
                        <form class="form-inline" method="GET" action="{{ route('cita.create') }}">
                        @csrf
                            <input id="id_medico" name="id_medico" type="hidden">
                            <input id="id_especialidad" name="id_especialidad" type="hidden">
                            <div class="form-group col-md-10">
                                <input id="especialidad" name="especialidad" class="form-control col-md-8" type="search" placeholder="Especialidad" aria-label="Search">
                            </div>
                            <div class="form-group col-md-10">
                                <input id="medico" name="medico" class="form-control col-md-8" type="search" placeholder="Médico" aria-label="Search">
                            </div>
                            <div class="form-group col-md-8">
                                <button class="btn btn-outline-info" type="submit">Registrar</button>
                            </div>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
        $('#especialidad').autocomplete({
            source: function(request, response){
                $.ajax({
                    url:"{{route('search.especialidad')}}",
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
                $('#id_especialidad').val(ui.item.id);
                
                return true;
            }
        });
        
        $('#medico').autocomplete({
            source: function(request, response){
                console.log(request);
                $.ajax({
                    url:"{{route('search.medicoscita')}}",
                    dataType : 'json',
                    data: {
                        term: request.term,
                        id: $('#id_especialidad').val()
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