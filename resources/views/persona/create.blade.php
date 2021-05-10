@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3>Editando Datos de la Persona</h3>
        </div>
        
        <div class="card-body">
            <form method="POST" action="{{ route('persona.save') }}" enctype="multipart/form-data">
            @csrf

                <div class="form-inline">
                    <div class="col-md-6">
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Apellido Paterno</label>
                            <input id="apellidopaterno" type="text" class="form-control col-md-8 @error('apellidopaterno') is-invalid @enderror" value="{{ old('apellidopaterno') }}" name="apellidopaterno"  autocomplete="apellidopaterno" autofocus>
                        
                            @error('apellidopaterno')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Apellido Materno</label>
                            <input id="apellidomaterno" type="text" class="form-control col-md-8 @error('apellidomaterno') is-invalid @enderror" value="{{ old('apellidomaterno') }}" name="apellidomaterno"  autocomplete="apellidomaterno">
                            @error('apellidomaterno')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Nombres</label>
                            <input id="nombre" type="text" class="form-control col-md-8 @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" name="nombre"  autocomplete="nombre">
                            @error('nombre')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 

                        <div class="form-group col-md-12">
                            <label class="col-md-4 col-form-label text-md-right" for="">Sexo</label>
                            <select class="form-control col-md-3" id="sexo" name="sexo">
                                <option>Seleccione...</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Teléfono Celular</label>
                            <input type="text" class="form-control col-md-8" name="telefonocelular" id="telefonocelular">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Teléfono Domicilio</label>
                            <input type="text" class="form-control col-md-8 @error('telefonodomicilio') is-invalid @enderror" name="telefonodomicilio" id="telefonodomicilio">
                            @error('telefonodomicilio')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="telefonotrabajo" >Telefono Trabajo</label>
                            <input type="text" class="form-control col-md-3" name="telefonotrabajo" id="telefonotrabajo">
                            <label class="col-md-2 text-md-right" for="Anexo">Anexo</label>
                            <input type="text" class="form-control col-md-3" name="Anexo" id="Anexo">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Dirección Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="direcciondomicilio" id="direcciondomicilio">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Referencia Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="referenciadomicilio" id="referenciadomicilio">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Distrito</label>
                            <select class="form-control col-md-4" id="distrito" name="distrito">
                                <option>Seleccione...</option>
                                <option value="Juliaca">Juliaca</option>
                                <option value="Puno">Puno</option>
                                <option value="Cabanillas">Cabanillas</option>
                                <option value="Caracoto">Caracoto</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Email</label>
                            <input type="text" class="form-control col-md-8 @error('email') is-invalid @enderror" name="email" id="email">
                            @error('email')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Lugar de Nacimiento</label>
                            <input type="text" class="form-control col-md-8" name="lugarnacimiento" id="lugarnacimiento">
                        </div>

                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group col-md-12">
                            <img src="{{ asset('adminlte/img/img-profile.jpg') }}" class="rounded" alt="User Image">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="image_path">Imagen de Perfil</label>
                            <input type="file" id="image_path-confirm" class="form-control col-md-8" name="image_path">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Fecha de Nacimiento</label>
                            <input type="date" class="form-control col-md-8 @error('fechanacimiento') is-invalid @enderror" name="fechanacimiento" id="fechanacimiento">
                            @error('fechanacimiento')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Estado Civil</label>
                            <select class="form-control col-md-8" id="estadocivil" name="estadocivil">
                                <option>Seleccione...</option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="divorciado">Divorciado</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Tipo Documento</label>
                            <select class="form-control col-md-4" id="tipodocumento" name="tipodocumento">
                                <option>Seleccione...</option>
                                <option value="dni">DNI</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                            <input type="text" class="form-control col-md-4 @error('documento') is-invalid @enderror" name="documento" id="documento" placeholder="Número Documento">
                            @error('documento')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="estado">Estado</label>
                            <select class="form-control col-md-4" id="estado" name="estado">
                                <option value="1">Vivo</option>
                                <option value="0">Muerto</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Observación</label>
                            <input type="text" class="form-control col-md-8" name="observacion" id="observacion">
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 text-md-center">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </div>     
            </form>
        </div>
    </div>
</div>
@endsection