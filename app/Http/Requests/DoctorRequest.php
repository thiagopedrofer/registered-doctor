<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'crm' => ['required', 'string'],
            'phone' => ['min:11','max:11'],
            'zip' => ['required','string'],
            'uf' => ['required', 'string', 'min:2','max:22'],
            'city' => ['required' , 'string'],
            'neighborhood' => ['required', 'string'],
            'street' => ['required', 'string'],
            'specialties' => ['required', 'array']
        ];
    }
}
