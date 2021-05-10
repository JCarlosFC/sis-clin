@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3>Formulario de Especialidades</h3>
        </div>
        
        <div class="card-body">
            <form  method="POST" action="{{ url('especialidad/update')}}/{{$especialidad->id}}}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{$especialidad->nombre}}" autofocus>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea class="form-control" id="descripcion" name="descripcion">{{$especialidad->descripcion}}</textarea>
                </div>
                <div class="col-md-12 text-md-center">
                    <button type="submit" class="btn btn-primary">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection