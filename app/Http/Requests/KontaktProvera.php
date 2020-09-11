<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KontaktProvera extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"=>"required|email",
            "naslov"=>"required|regex:/[A-z0-9]+/",
            "text"=>"required|regex:/[A-z0-9]+/",
        ];



    }
    public function messages()
    {
        return [
            'email.required' => 'E-mail je obavezan!',
            'email.email' => 'E-mail nije u dobrom formatu!',
            'naslov.required' => 'Nalov je obavezan!',
            'naslov.regex' => 'Naslov nije u dobrom formatu!',
            'text.required'=>'Poruka je obavezna!',
            'text.regex'=>'Poruka nije u dobrom formatu!',
        ];
    }
}
