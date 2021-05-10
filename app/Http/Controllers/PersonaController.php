<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Persona;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function persona(){      
        return view('persona.persona');
    }

    public function create(){
        
        return view('persona.create');
    }

    public function edit($id){
        $Persona = Persona::findOrFail($id);
        
        /*var_dump($Persona);
        dd($Persona);*/
        return view('persona.edit', ['Persona'=>$Persona]);
    }

    public function save(Request $request){
        $apellidopaterno = $request->input('apellidopaterno');
        $apellidomaterno = $request->input('apellidomaterno');
        $nombre = $request->input('nombre');
        $sexo = $request->input('sexo');
        $fechanacimiento = $request->input('fechanacimiento');
        $telefonocelular = $request->input('telefonocelular');
        $estadocivil = $request->input('estadocivil');
        $telefonodomicilio = $request->input('telefonodomicilio');
        $tipodocumento = $request->input('tipodocumento');
        $documento = $request->input('documento');
        $telefonotrabajo = $request->input('telefonotrabajo');
        $Anexo = $request->input('Anexo');
        $observacion = $request->input('observacion');
        $direcciondomicilio = $request->input('direcciondomicilio');
        $referenciadomicilio = $request->input('referenciadomicilio');
        $distrito = $request->input('distrito');
        $email = $request->input('email');
        $lugarnacimiento = $request->input('lugarnacimiento');
        $estado = $request->input('estado');
        $image_path = $request->file('image_path');

        $validate = $this->validate($request,[
            'apellidopaterno' => ['required', 'string', 'max:255'],
            'apellidomaterno' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'documento' => ['required', 'numeric'],
            'telefonodomicilio' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'fechanacimiento'=> ['required']
        ]);
        
        $persona = new Persona();
        $persona->apellido_paterno= $apellidopaterno;
        $persona->apellido_materno = $apellidomaterno;
        $persona->nombres = $nombre;
        $persona->sexo = $sexo;
        $persona->fecha_nacimiento = $fechanacimiento;
        $persona->telefono_celular = $telefonocelular;
        $persona->telefono_domicilio = $telefonodomicilio;
        $persona->telefono_trabajo = $telefonotrabajo;
        $persona->estado_civil = $estadocivil;
        $persona->tipo_documento = $tipodocumento;
        $persona->numero_documento = $documento;
        $persona->anexo = $Anexo;
        $persona->observacion = $observacion;
        $persona->direccion_domicilio = $direcciondomicilio;
        $persona->referencia_domicilio = $referenciadomicilio;
        $persona->distrito = $distrito ;
        $persona->email = $email;
        $persona->lugar_nacimiento = $lugarnacimiento;
        $persona->estado = $estado;
        
        //dd($request);
        if($image_path){
            
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage/app/user
            Storage::disk('persona')->put($image_path_name, File::get($image_path));

            $persona->image = $image_path_name;
        }


        $persona->save();

        return redirect()->route('persona')->with(['message'=>'Persona agregada correctamente']);
    }

    public function update(Request $request, $id){
        
        $apellidopaterno = $request->input('apellidopaterno');
        $apellidomaterno = $request->input('apellidomaterno');
        $nombre = $request->input('nombre');
        $sexo = $request->input('sexo');
        $fechanacimiento = $request->input('fechanacimiento');
        $telefonocelular = $request->input('telefonocelular');
        $estadocivil = $request->input('estadocivil');
        $telefonodomicilio = $request->input('telefonodomicilio');
        $tipodocumento = $request->input('tipodocumento');
        $documento = $request->input('documento');
        $telefonotrabajo = $request->input('telefonotrabajo');
        $Anexo = $request->input('Anexo');
        $observacion = $request->input('observacion');
        $direcciondomicilio = $request->input('direcciondomicilio');
        $referenciadomicilio = $request->input('referenciadomicilio');
        $distrito = $request->input('distrito');
        $email = $request->input('email');
        $lugarnacimiento = $request->input('lugarnacimiento');
        $estado = $request->input('estado');

        $validate = $this->validate($request,[
            'apellidopaterno' => ['required', 'string', 'max:255'],
            'apellidomaterno' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255'],
            'documento' => ['required', 'numeric'],
            'telefonodomicilio' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'fechanacimiento'=> ['required'],
            'image_path' => ['image']
        ]);


        $persona = Persona::find($id);
        $persona->apellido_paterno= $apellidopaterno;
        $persona->apellido_materno = $apellidomaterno;
        $persona->nombres = $nombre;
        $persona->sexo = $sexo;
        $persona->fecha_nacimiento = $fechanacimiento;
        $persona->telefono_celular = $telefonocelular;
        $persona->telefono_domicilio = $telefonodomicilio;
        $persona->telefono_trabajo = $telefonotrabajo;
        $persona->estado_civil = $estadocivil;
        $persona->tipo_documento = $tipodocumento;
        $persona->numero_documento = $documento;
        $persona->anexo = $Anexo;
        $persona->observacion = $observacion;
        $persona->direccion_domicilio = $direcciondomicilio;
        $persona->referencia_domicilio = $referenciadomicilio;
        $persona->distrito = $distrito ;
        $persona->email = $email;
        $persona->lugar_nacimiento = $lugarnacimiento;
        $persona->estado = $estado;

        $image_path = $request->file('image_path');
        //dd($request);
        if($image_path){
            
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage/app/user
            Storage::disk('persona')->put($image_path_name, File::get($image_path));

            $persona->image = $image_path_name;
        }

        $persona->update();

        return redirect()->route('persona')->with(['message'=>'Persona actualizada correctamente']);
    }

    public function search(Request $request){
        
        /*$validate = $this->validate($request,[
            
            'numero_documento' => ['min:7','numeric', 'max:8'],
        ]);*/

        /*
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'surname2' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
        */

        $apellidopaterno = $request->input('ap_paterno');
        $apellidomaterno = $request->input('ap_materno');
        $nombre = $request->input('nombre');
        $documento = $request->input('documento');
        $verify = $request->input('verify');
        //dd($verify);
        $Persona = Persona::nombres($nombre)->apellidopaterno($apellidopaterno)->apellidomaterno($apellidomaterno)->documento($documento)->paginate(10);
        $Test = false;

        
        if($verify!=null){
            if(!$Persona->isEmpty()){
            $Test = true;
            }
        }   
        
        return view('persona.search', compact('Persona','Test'));
    }
    
    public function getImage($filename){
        //dd($filename);
        $file = Storage::disk('persona')->get($filename);
        return new Response($file,200);
    }

}
