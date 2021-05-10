<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Models\Especialidad;
use App\Models\Medico;
use Illuminate\Support\Facades\DB;

class EspecialidadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregarmedico($id, Request $request)
    {
        $idMedico = $request->input('id_medico');
        
        $especialidad = Especialidad::findOrFail($id);

        $especialidad->medicos()->syncWithoutDetaching($idMedico);
        return redirect()->route('especialidad/medicos/1')->with(['message'=>'Medico asignado correctamente']);
    }

    public function especialidad()
    {
        $especialidades = Especialidad::all();
        /*var_dump($especialidades);
        dd($especialidades);*/
        return view('especialidad.especialidad',compact('especialidades'));
    }

    public function create()
    {
        return view('especialidad.create');
    }

    public function save(Request $request)
    {
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        //dd($descripcion);

        
        $especialidad = new Especialidad();

        $especialidad->nombre = $nombre;
        $especialidad->descripcion = $descripcion;

        $especialidad->save();

        return redirect()->route('especialidad')->with(['message'=>'Especialidad agregada correctamente']);
    }

    public function edit($id){
        $especialidad = Especialidad::findOrFail($id);
        return view('especialidad.edit', ['especialidad'=>$especialidad]);
    }

    public function update(Request $request, $id)
    {
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        //dd($descripcion);

        
        $especialidad = Especialidad::find($id);

        $especialidad->nombre = $nombre;
        $especialidad->descripcion = $descripcion;

        $especialidad->update();

        return redirect()->route('especialidad')->with(['message'=>'Especialidad actualizada correctamente']);
    }

    public function searchMedicos(Request $request)
    {
        $term = $request->get('term');
        
        $querys = Medico::select(DB::raw('CONCAT(nombres," ",apellido_paterno," ",apellido_materno) AS nombre_completo'),'id')
                    ->where('nombres','Like','%'.$term.'%')
                    ->orWhere('apellido_paterno','Like','%'.$term.'%')
                    ->orWhere('apellido_materno','Like','%'.$term.'%')
                    ->get();
        
        $data = [];

        foreach($querys as $query){
            $data[] = [
                'id' => $query->id,
                'label' => $query->nombre_completo
            ];
        }
        return $data;
        
    }

    public function searchMedicosCita(Request $request)
    {
        $term = $request->get('term');
        $id= $request->get('id');
        $querys = Medico::select(DB::raw('CONCAT(nombres," ",apellido_paterno," ",apellido_materno) AS nombre_completo'),'medicos.id')
                    ->rightJoin('especialidad_medico', function ($join) use ($id){
                        $join->on('medicos.id','=','especialidad_medico.id_medico')
                        ->on('especialidad_medico.id_especialidad', '=', DB::raw($id));
                    })
                    ->where('nombres','Like','%'.$term.'%')
                    ->orWhere('apellido_paterno','Like','%'.$term.'%')
                    ->orWhere('apellido_materno','Like','%'.$term.'%')
                    ->get();
        
        $data = [];

        foreach($querys as $query){
            $data[] = [
                'id' => $query->id,
                'label' => $query->nombre_completo
            ];
        }
        return $data;
        
    }

    public function searchEspecialidad(Request $request)
    {
        $term = $request->get('term');
        $querys = Especialidad::select('nombre','id')
                    ->where('nombre','Like','%'.$term.'%')
                    ->get();
        
        $data = [];

        foreach($querys as $query){
            $data[] = [
                'id' => $query->id,
                'label' => $query->nombre
            ];
        }
        return $data;
    }

    



    public function medicos($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        //dd($especialidad);
        return view('especialidad.medicos', compact('especialidad'));
    }

    /*public function asignarMedico($id)
    {

    }*/

    public function test()
    {
        $especialidad = Especialidad::findOrFail(2);

        return $especialidad->medicos;
    }

}
