<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'url_foto' => 'required|url',
            'descripcion' => 'required|string',
        ];
    }
}

