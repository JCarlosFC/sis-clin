<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'id_persona';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'sexo',
        'fecha_nacimiento',
        'telefono_celular',
        'telefono_domicilio',
        'telefono_trabajo',
        'estado_civil',
        'tipo_documento',
        'numero_documento',
        'anexo',
        'observacion',
        'direccion_domicilio',
        'referencia_domicilio',
        'distrito',
        'email',
        'lugar_nacimiento'
    ];

    public function scopeNombres($query, $nombres){
        if($nombres){
            return $query->where('nombres','like',"%$nombres%");
        }
    }

    public function scopeApellidopaterno($query, $apellidoPaterno){
        if($apellidoPaterno){
            return $query->where('apellido_paterno','like',"%$apellidoPaterno%");
        }
    }

    public function scopeApellidomaterno($query, $apellidoMaterno){        
        if($apellidoMaterno){
            return $query->where('apellido_materno','like',"%$apellidoMaterno%");
        }
    }

    public function scopeDocumento($query, $documento){        
        if($documento){
            return $query->where('numero_documento','like',"%$documento%");
        }
    }
    /*public function scopeId($query, $id){
        if($id){
            return $query->where('id_persona');
        }
    }*/
}