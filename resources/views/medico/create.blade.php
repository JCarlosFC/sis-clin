@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3>Formulario de Datos del Médico</h3>
        </div>

        <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('medico.save') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-inline">
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" class="form-control col-md-8 @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" id="apellido_paterno" autofocus value="{{ old('apellido_paterno') }}">

                            @error('apellido_paterno')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="apellido_materno">Apellido Materno</label>
                            <input type="text" class="form-control col-md-8 @error('apellido_paterno') is-invalid @enderror" name="apellido_materno" id="apellido_materno" value="{{ old('apellido_materno') }}">

                            @error('apellido_materno')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="nombres">Nombres</label>
                            <input type="text" class="form-control col-md-8 @error('apellido_paterno') is-invalid @enderror" name="nombres" id="nombres" value="{{ old('nombres') }}">

                            @error('apellido_materno')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> 

                        <div class="form-group col-md-12">
                            <label class="col-md-4 col-form-label text-md-right" for="id_colegio_estudio">Colegio de Estudios</label>
                            <select class="form-control col-md-3" name="id_colegio_estudio" id="id_colegio_estudio">
                                <option>Elegir</option>
                                @foreach( $colegios as $colegio )
                                <option value="{{$colegio['id']}}">{{$colegio['abreviatura']}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="form-control col-md-5" name="numero_colegio_estudio" id="numero_colegio_estudio" placeholder="Número Colegio de estudio">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="rne">R.N.E.</label>
                            <input type="text" class="form-control col-md-8" name="rne" id="rne">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="honorarios">Honorarios</label>
                            <select class="form-control col-md-3" name="honorarios" id="honorarios">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                            <label class="col-md-2 text-md-right" for="ruc">RUC</label>
                            <input type="text" class="form-control col-md-3" name="ruc" id="ruc">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="cuenta_corriente">Cuenta Corriente CTR</label>
                            <input type="text" class="form-control col-md-8" name="cuenta_corriente" id="cuenta_corriente">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="sexo">Sexo</label>
                            <select class="form-control col-md-4" name="sexo" id="sexo">
                                <option value="">Elegir</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="telefono_domicilio">Telefono Domicilio</label>
                            <input type="text" class="form-control col-md-3" name="telefono_domicilio" id="telefono_domicilio" value="{{ old('telefono_domicilio') }}">
                            

                            <label class="col-md-2 text-md-right" for="celular">Celular </label>
                            <input type="text" class="form-control col-md-3" name="celular" id="celular">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="direccion_domicilio">Dirección Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="direccion_domicilio" id="direccion_domicilio">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="distrito">Distrito</label>
                            <select class="form-control col-md-8" name="distrito" id="distrito">
                                <option value="">Seleccione...</option>
                                <option value="Juliaca">Juliaca</option>
                                <option value="Puno">Puno</option>
                                <option value="Cabanillas">Cabanillas</option>
                                <option value="Caracoto">Caracoto</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="referencia_domicilio">Referencia Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="referencia_domicilio" id="referencia_domicilio">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="email">Email</label>
                            <input type="text" class="form-control col-md-8 @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="lugar_nacimiento">Lugar de Nacimiento</label>
                            <input type="text" class="form-control col-md-8" name="lugar_nacimiento" id="lugar_nacimiento">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <img src="{{ asset('adminlte/img/img-profile.jpg') }}" alt="imagen de perfil" class="rounded">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="image_path">Imagen de Perfil</label>
                            <input id="image_path-confirm" type="file" class="form-control col-md-8" name="image_path" >
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control col-md-8 @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">

                            @error('fecha_nacimiento')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="estado_civil">Estado Civil</label>
                            <select class="form-control col-md-8" name="estado_civil" id="estado_civil">
                                <option>Seleccione...</option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="divorciado">Divorciado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="codigo_medico">Código de medico</label>
                            <input type="text" class="form-control col-md-8" name="codigo_medico" id="codigo_medico">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="tipo_documento">Tipo Documento</label>
                            <select class="form-control col-md-4" name="tipo_documento" id="tipo_documento">
                                <option value="">Seleccione...</option>
                                <option value="dni">DNI</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <input type="text" class="form-control col-md-4 @error('numero_documento') is-invalid @enderror" placeholder="Número Documento" name="numero_documento" id="numero_documento" value="{{ old('numero_documento') }}">
                            
                            @error('numero_documento')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="estado">Estado</label>
                            <select class="form-control col-md-4" name="estado" id="estado">
                                <option value="1">Activo</option>
                                <option value="0">No Activo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="user_login">Login</label>
                            <input type="text" class="form-control col-md-8" name="user_login" id="user_login">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="user_password">Contraseña</label>
                            <input type="text" class="form-control col-md-8" name="user_password" id="user_password">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="observacion">Observación</label>
                            <input type="text" class="form-control col-md-8" name="observacion" id="observacion">
                        </div>
                        <div class="form-group col-md-12">
                            <span class="col-md-6"></span>
                            <span class="col-md-6 text-md-center badge rounded-pill bg-danger">Lo que ingrese se verá en citas</span>
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 text-md-center">
                        <button type="submit" class="btn btn-primary">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection