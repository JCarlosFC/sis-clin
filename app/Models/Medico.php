<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medicos';
    protected $primaryKey = 'id';

    public function especialidades(){
        return $this->belongsToMany(Especialidad::class, 'especialidad_medico', 'id_especialidad', 'id_medico'); // Tabla pivot, id pivot1,id pivot2
    }
    
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

    public function scopeCodigo($query, $codigo){        
        if($codigo){
            return $query->where('codigo_medico','like',"%$codigo%");
        }
    }
}
