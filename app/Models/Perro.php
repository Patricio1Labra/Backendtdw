<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Laravel\Passport\HasApiTokens;

class Perro extends Model implements Authenticatable
{
    use AuthenticableTrait, HasApiTokens;
    protected $table = 'perros';

    protected $fillable = [
        'nombre',
        'sexo',
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

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
