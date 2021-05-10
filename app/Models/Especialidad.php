<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidads';
    protected $primaryKey = 'id';

    public function medicos(){
        return $this->belongsToMany(Medico::class, 'especialidad_medico', 'id_especialidad', 'id_medico'); // Tabla pivot, id pivot1,id pivot2
    }
}
