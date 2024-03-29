<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaccion extends Model
{
    protected $table = 'interaccions';

    protected $fillable = [
        'perro_interesado_id',
        'perro_candidato_id',
        'preferencia',
        'identificador',
        'fecha_creacion',
    ];

    // Relación con el modelo Perro (Perro interesado)
    public function perroInteresado()
    {
        return $this->belongsTo(Perro::class, 'perro_interesado_id');
    }

    // Relación con el modelo Perro (Perro candidato)
    public function perroCandidato()
    {
        return $this->belongsTo(Perro::class, 'perro_candidato_id');
    }

}
