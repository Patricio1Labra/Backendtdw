<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    protected $table = 'perros';

    protected $fillable = [
        'nombre',
        'url_foto',
        'descripcion',
        'email',
        'password',
    ];

    // Relación con el modelo Interaccion (Perros interesados)
    public function perrosInteresados()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }

    // Relación con el modelo Interaccion (Perros candidatos)
    public function perrosCandidatos()
    {
        return $this->hasMany(Interaccion::class, 'perro_candidato_id');
    }
}
