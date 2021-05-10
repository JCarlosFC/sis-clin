<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Medico;
use App\Models\ColegioEstudio;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MedicoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function medico(){
        return view('medico.medico');
    }

    public function create(){
        $colegios = ColegioEstudio::all();
        return view('medico.create',compact('colegios'));
    }
    
    public function edit($id){
        $colegios = ColegioEstudio::all();
        $Medico = Medico::findOrFail($id);
        return view('medico.edit', ['Medico'=>$Medico], compact('colegios'));
    }

    public function save(Request $request){
        $apellido_paterno = $request->input('apellido_paterno');
        $apellido_materno = $request->input('apellido_materno');
        $nombres = $request->input('nombres');
        $id_colegio_estudio = $request->input('id_colegio_estudio');
        $numero_colegio_estudio = $request->input('numero_colegio_estudio');
        $rne = $request->input('rne');
        $honorarios = $request->input('honorarios');
        $ruc = $request->input('ruc');
        $cuenta_corriente = $request->input('cuenta_corriente');
        $sexo = $request->input('sexo');
        $telefono_domicilio = $request->input('telefono_domicilio');
        $celular = $request->input('celular');
        $direccion_domicilio = $request->input('direccion_domicilio');
        $distrito = $request->input('distrito');
        $referencia_domicilio = $request->input('referencia_domicilio');
        $email = $request->input('email');
        $lugar_nacimiento = $request->input('lugar_nacimiento');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $estado_civil = $request->input('estado_civil');
        $codigo_medico = $request->input('codigo_medico');
        $tipo_documento = $request->input('tipo_documento');
        $numero_documento = $request->input('numero_documento');
        $observacion = $request->input('observacion');
        $estado = $request->input('estado');
        

        $validate = $this->validate($request,[
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'fecha_nacimiento'=> ['required']
        ]);
        
        $medico = new Medico();
        $medico->apellido_paterno= $apellido_paterno;
        $medico->apellido_materno = $apellido_materno;
        $medico->nombres = $nombres;
        $medico->id_colegio_estudio = $id_colegio_estudio;
        $medico->numero_colegio_estudio = $numero_colegio_estudio;
        $medico->rne = $rne;
        $medico->honorarios = $honorarios;
        $medico->ruc = $ruc;
        $medico->cuenta_corriente_ctr = $cuenta_corriente;
        $medico->sexo = $sexo;
        $medico->telefono_domicilio = $telefono_domicilio;
        $medico->celular = $celular;
        $medico->direccion_domicilio = $direccion_domicilio;
        $medico->distrito = $distrito;
        $medico->referencia_domicilio = $referencia_domicilio;
        $medico->email = $email;
        $medico->lugar_nacimiento = $lugar_nacimiento;
        $medico->fecha_nacimiento = $fecha_nacimiento;
        $medico->estado_civil = $estado_civil;
        $medico->codigo_medico = $codigo_medico;
        $medico->tipo_documento = $tipo_documento;
        $medico->numero_documento = $numero_documento;
        $medico->observacion = $observacion;
        $medico->estado = $estado;
        
        $image_path = $request->file('image_path');
        if($image_path){
            
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage/app/user
            Storage::disk('medico')->put($image_path_name, File::get($image_path));

            $medico->image = $image_path_name;
        }


        $medico->save();

        return redirect()->route('medico')->with(['message'=>'Médico agregado correctamente']);
    }

    public function update(Request $request, $id){
        
        $apellido_paterno = $request->input('apellido_paterno');
        $apellido_materno = $request->input('apellido_materno');
        $nombres = $request->input('nombres');
        $id_colegio_estudio = $request->input('id_colegio_estudio');
        $numero_colegio_estudio = $request->input('numero_colegio_estudio');
        $rne = $request->input('rne');
        $honorarios = $request->input('honorarios');
        $ruc = $request->input('ruc');
        $cuenta_corriente = $request->input('cuenta_corriente');
        $sexo = $request->input('sexo');
        $telefono_domicilio = $request->input('telefono_domicilio');
        $celular = $request->input('celular');
        $direccion_domicilio = $request->input('direccion_domicilio');
        $distrito = $request->input('distrito');
        $referencia_domicilio = $request->input('referencia_domicilio');
        $email = $request->input('email');
        $lugar_nacimiento = $request->input('lugar_nacimiento');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $estado_civil = $request->input('estado_civil');
        $codigo_medico = $request->input('codigo_medico');
        $tipo_documento = $request->input('tipo_documento');
        $numero_documento = $request->input('numero_documento');
        $observacion = $request->input('observacion');
        $estado = $request->input('estado');
        

        $validate = $this->validate($request,[
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'numero_documento' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'fecha_nacimiento'=> ['required']
        ]);


        $medico = Medico::find($id);
        $medico->apellido_paterno= $apellido_paterno;
        $medico->apellido_materno = $apellido_materno;
        $medico->nombres = $nombres;
        $medico->id_colegio_estudio = $id_colegio_estudio;
        $medico->numero_colegio_estudio = $numero_colegio_estudio;
        $medico->rne = $rne;
        $medico->honorarios = $honorarios;
        $medico->ruc = $ruc;
        $medico->cuenta_corriente_ctr = $cuenta_corriente;
        $medico->sexo = $sexo;
        $medico->telefono_domicilio = $telefono_domicilio;
        $medico->celular = $celular;
        $medico->direccion_domicilio = $direccion_domicilio;
        $medico->distrito = $distrito;
        $medico->referencia_domicilio = $referencia_domicilio;
        $medico->email = $email;
        $medico->lugar_nacimiento = $lugar_nacimiento;
        $medico->fecha_nacimiento = $fecha_nacimiento;
        $medico->estado_civil = $estado_civil;
        $medico->codigo_medico = $codigo_medico;
        $medico->tipo_documento = $tipo_documento;
        $medico->numero_documento = $numero_documento;
        $medico->observacion = $observacion;
        $medico->estado = $estado;

        $image_path = $request->file('image_path');
        //dd($image_path);
        if($image_path){
            
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage/app/user
            Storage::disk('medico')->put($image_path_name, File::get($image_path));

            $medico->image = $image_path_name;
        }

        $medico->update();

        return redirect()->route('medico')->with(['message'=>'Medico actualizado correctamente']);
    }

    public function search(Request $request){
        
        $apellidopaterno = $request->input('ap_paterno');
        $apellidomaterno = $request->input('ap_materno');
        $nombre = $request->input('nombre');
        $codigo = $request->input('codigo');
        $verify = $request->input('verify');
        //dd($verify);
        $medico = Medico::nombres($nombre)->apellidopaterno($apellidopaterno)->apellidomaterno($apellidomaterno)->codigo($codigo)->paginate(10);
        /*var_dump($medico);
        dd($medico);*/
        $Test = false;

        
        if($verify!=null){
            if(!$medico->isEmpty()){
            $Test = true;
            }
        }   
        
        return view('medico.search', compact('medico','Test'));
    }
    
    public function getImage($filename){
        //dd($filename);
        $file = Storage::disk('medico')->get($filename);
        return new Response($file,200);
    }

    public function test()
    {
        $medico = Medico::findOrFail(1);

        return $medico->especialidades;
    }
}
