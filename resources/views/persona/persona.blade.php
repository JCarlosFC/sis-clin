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
                    <h3>Buscar Persona</h3>
                </div>
                
                <div class="card-body">
                    <div class="form-group col-md-10">
                        <nav class="navbar navbar-light bg-light float-right">
                            <form class="form-inline" method="GET" action="{{ route('persona.search') }}">
                                <input name="verify" type="hidden" value="1">
                                <input name="ap_paterno" class="form-control mr-sm-2" type="search" placeholder="Apellido Paterno" aria-label="Search">
                                <input name="ap_materno" class="form-control mr-sm-2" type="search" placeholder="Apellido Materno" aria-label="Search">
                                <input name="nombre" class="form-control mr-sm-2" type="search" placeholder="Nombres" aria-label="Search">
                                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </nav>
                    </div>

                    <div class="form-group col-md-8">
                        <nav class="navbar navbar-light bg-light float-right">
                            <form class="form-inline" method="GET" action="{{ route('persona.search') }}">
                                <input name="verify" type="hidden" value="1">
                                <input name="documento" class="form-control mr-sm-2 @error('name') is-invalid @enderror" type="search" placeholder="dni" aria-label="Search">
                                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </nav>
                    </div>
                @yield('busqueda')
        
                </div>       
                <div class="form-group col-md-10">
                    <div class="offset-md-5">
                        <p>Si no encuentra al paciente usted puede</p>
                        <a href="{{ route('persona.create') }}">
                            <button class="btn btn-primary">
                                Añadir
                            </button>
                        </a>
                    </div>
                </div>
                
            </div>
    </div>
</div>
@endsection