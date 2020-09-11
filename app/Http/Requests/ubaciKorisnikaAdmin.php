<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ubaciKorisnikaAdmin extends FormRequest
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
           "ime"=>'required|regex:[^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$]',
           "prezime"=>'required|regex:[^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$]',
           "email"=>'required|email',
           'lozinka'=>'required|regex:[^[A-z0-9.?!]{6,}]'
        ];
    }
    public function messages()
    {
        return [
            'ime.required' => 'Ime nije u dobrom formatu!',
            'prezime.required' => 'Prezime nije u dobrom formatu!',
            'email.required' => 'E-mail je obavezan!',
            'email.email' => 'E-mail nije u dobrom formatu!',
            'lozinka.required' => 'Lozinka je obavezna!',
            'lozinka.regex' => 'Lozinka nije u dobrom formatu!',
        ];
    }
}
