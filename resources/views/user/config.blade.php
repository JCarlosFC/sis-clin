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
                    <h3>Configuración de Cuenta</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Paterno') }}</label>

                            <div class="col-md-5">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>

                            <div class="col-md-5">
                                <input id="surname2" type="text" class="form-control @error('surname2') is-invalid @enderror" name="surname2" value="{{ Auth::user()->surname2 }}" required autocomplete="surname2" autofocus>

                                @error('surname2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nick" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                            
                            <div class="col-md-5">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ Auth::user()->nick }}" required autocomplete="nick" autofocus>
                            
                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('foto de perfil') }}</label>

                            <div class="col-md-5">
                                <input id="image_path-confirm" type="file" class="form-control" name="image_path" >
                            </div>
                            @error('image_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if(Auth::user()->image)
                            <div class="form-group row">
                                <div class="col-md-3 offset-md-4">
                                    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" alt="imagen de perfil" class="img-circle mx-auto d-block">
                                </div>
                            </div>    
                        @endif
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </div>                        
                    </form>
                </div> 
            </div>       
        </div>  
    
</div>
@endsection