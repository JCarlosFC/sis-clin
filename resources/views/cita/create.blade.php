@extends('admin.layout')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <h3>Formulario de Reserva de Cita</h3>
        </div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            @csrf
                <div class="form-inline">
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label class="col-md-4 text-md-right" for="fecha">Fecha</label>
                            <input type="date" class="form-control col-md-2" name="fecha" id="fecha" autofocus>
                        </div>
                        
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-info">
                                    <th>#</th>
                                    <th>Hora</th>
                                    <th>Persona</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <span>1</span>
                                            <input type="checkbox" class="form-check-label" id="">
                                        </div>
                                    </th>
                                    <th>8:00 a.m</th>
                                    <td>Jhan Carlos Flores Chaiña</td>
                                    <td>1965 H:0200597 angie.mallqui</td>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <span>2</span>
                                            <input type="checkbox" class="form-check-label" id="">
                                        </div>
                                    </th>
                                    <th>9:00 a.m</th>
                                    <td>Jhan Carlos Flores Chaiña</td>
                                    <td>1965 H:0200597 angie.mallqui</td>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                            <span>3</span>
                                            <input type="checkbox" class="form-check-label" id="">
                                        </div>
                                    </th>
                                    <th>9:00 a.m</th>
                                    <td>Jhan Carlos Flores Chaiña</td>
                                    <td>1965 H:0200597 angie.mallqui</td>
                                </tr>
                            </tbody>
                        </table>
                        
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