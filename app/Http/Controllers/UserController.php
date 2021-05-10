<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        //usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //validación de formulario
        $validate = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'surname2' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,'.$id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'image_path' => ['image'],
        ]);
        //dd($validate);
        
        //recoger datos de formulario
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $nick = $request->input('nick');
        $email = $request->input('email');
        $password = $request->input('password');

        //Asignar nuevos valores

        $user->name=$name;
        $user->surname=$surname;
        $user->surname2=$surname2;
        $user->nick=$nick;
        $user->email=$email;
        $user->password=Hash::make($password);
        
        // subir imagen

        $image_path = $request->file('image_path');
        if($image_path){
            
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage/app/user
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            $user->image = $image_path_name;
        }
        

        // Ejecutar consulta y cambios a base de datos

        $user->update();
        
        return redirect()->route('config')
                        ->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function getImage($filename){
        
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}
