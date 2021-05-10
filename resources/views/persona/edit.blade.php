@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3>Editando Datos de la Persona</h3>
        </div>
    </div>
        
        <div class="card-body">
            <form method="POST" action="{{ url('persona/update')}}/{{$Persona->id_persona}}" enctype="multipart/form-data">
            @csrf
            <div class="form-inline">
                <input type="hidden" name="id" value="{{$Persona->id_persona}}">
                    <div class="col-md-6">
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Apellido Paterno</label>
                            <input id="apellidopaterno" type="text" class="form-control col-md-8 @error('apellidopaterno') is-invalid @enderror" value="{{$Persona->apellido_paterno}}" name="apellidopaterno"  autocomplete="apellidopaterno" autofocus>
                        
                            @error('apellidopaterno')
                            <span class="invalid-feedback text-md-right" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Apellido Materno</label>
                            <input id="apellidomaterno" type="text" class="form-control col-md-8 @error('apellidomaterno') is-invalid @enderror" value="{{$Persona->apellido_materno}}" name="apellidomaterno"  autocomplete="apellidomaterno">
                            @error('apellidomaterno')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Nombres</label>
                            <input id="nombre" type="text" class="form-control col-md-8 @error('nombre') is-invalid @enderror" value="{{$Persona->nombres}}" name="nombre"  autocomplete="nombre">
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
                                <option value="masculino" {{ ( $Persona->sexo == 'masculino') ? 'selected' : '' }}>Masculino</option>
                                <option value="femenino" {{ ( $Persona->sexo == 'femenino') ? 'selected' : '' }}>Femenino</option>
                                <option value="otro" {{ ( $Persona->sexo == 'otro') ? 'selected' : '' }}>Otro</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Teléfono Celular</label>
                            <input type="text" class="form-control col-md-8" name="telefonocelular" id="telefonocelular" value="{{$Persona->telefono_celular}}">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Teléfono Domicilio</label>
                            <input type="text" class="form-control col-md-8 @error('telefonodomicilio') is-invalid @enderror" name="telefonodomicilio" id="telefonodomicilio" value="{{$Persona->telefono_domicilio}}">
                            @error('telefonodomicilio')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="telefonotrabajo" >Telefono Trabajo</label>
                            <input type="text" class="form-control col-md-3" name="telefonotrabajo" id="telefonotrabajo" value="{{$Persona->telefono_trabajo}}">
                            <label class="col-md-2 text-md-right" for="Anexo">Anexo</label>
                            <input type="text" class="form-control col-md-3" name="Anexo" id="Anexo" value="{{$Persona->anexo}}">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Dirección Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="direcciondomicilio" id="direcciondomicilio" value="{{$Persona->direccion_domicilio}}">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Referencia Domicilio</label>
                            <input type="text" class="form-control col-md-8" name="referenciadomicilio" id="referenciadomicilio" value="{{$Persona->referencia_domicilio}}">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Distrito</label>
                            <select class="form-control col-md-4" id="distrito" name="distrito">
                                <option>Seleccione...</option>
                                <option value="juliaca" {{ ( $Persona->distrito == 'juliaca') ? 'selected' : '' }}>Juliaca</option>
                                <option value="puno" {{ ( $Persona->distrito == 'puno') ? 'selected' : '' }}>Puno</option>
                                <option value="cabanillas" {{ ( $Persona->distrito == 'cabanillas') ? 'selected' : '' }}>Cabanillas</option>
                                <option value="caracoto" {{ ( $Persona->distrito == 'caracoto') ? 'selected' : '' }}>Caracoto</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Email</label>
                            <input type="text" class="form-control col-md-8 @error('email') is-invalid @enderror" name="email" id="email" value="{{$Persona->email}}">
                            @error('email')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Lugar de Nacimiento</label>
                            <input type="text" class="form-control col-md-8" name="lugarnacimiento" id="lugarnacimiento" value="{{$Persona->lugar_nacimiento}}">
                        </div>

                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group col-md-12">
                            @if($Persona->image)
                                <img src="{{ route('persona.avatar',['filename'=>$Persona->image]) }}" alt="imagen de perfil" class="rounded">
                            @else
                                <img src="{{ asset('adminlte/img/img-profile.jpg') }}" alt="imagen de perfil" class="rounded">
                            @endif
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="image_path">Imagen de Perfil</label>
                            <input type="file" id="image_path-confirm" class="form-control col-md-8" name="image_path">
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Fecha de Nacimiento</label>
                            <input type="date" class="form-control col-md-8 @error('fechanacimiento') is-invalid @enderror" name="fechanacimiento" id="fechanacimiento" value="{{$Persona->fecha_nacimiento}}">
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
                                <option value="soltero" {{ ( $Persona->estado_civil == 'soltero') ? 'selected' : '' }}>Soltero</option>
                                <option value="casado" {{ ( $Persona->estado_civil == 'casado') ? 'selected' : '' }}>Casado</option>
                                <option value="divorciado" {{ ( $Persona->estado_civil == 'divorciado') ? 'selected' : '' }}>Divorciado</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Tipo Documento</label>
                            <select class="form-control col-md-4" id="tipodocumento" name="tipodocumento">
                                <option>Seleccione...</option>
                                <option value="dni" {{ ( $Persona->tipo_documento == 'dni') ? 'selected' : '' }}>DNI</option>
                                <option value="pasaporte" {{ ( $Persona->tipo_documento == 'pasaporte') ? 'selected' : '' }}>Pasaporte</option>
                            </select>
                            <input type="text" class="form-control col-md-4 @error('documento') is-invalid @enderror" name="documento" id="documento" placeholder="Número Documento" value="{{$Persona->numero_documento}}">
                            @error('documento')
                                <span class="invalid-feedback text-md-right" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="estado">Estado</label>
                            <select class="form-control col-md-4" id="estado" name="estado">
                                <option value="1" {{ ( $Persona->estado == 1) ? 'selected' : '' }}>Vivo</option>
                                <option value="0" {{ ( $Persona->estado == 0) ? 'selected' : '' }}>Muerto</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="">Observación</label>
                            <input type="text" class="form-control col-md-8" name="observacion" id="observacion" value="{{$Persona->observacion}}">
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