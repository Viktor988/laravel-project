<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveraMarka extends FormRequest
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
           'marka'=>'required|regex:[[A-z0-9\s]+]|unique:marke,nazivMarka'
        ];
    }
    public function messages()
    {
        return [
            'marka.required' => 'Marka je obavezana!',
            'marka.regex' => 'Marka nije u dobrom formatu!',
            'marka.unique' => 'Vec postoji ta marka'

        ];
    }
}
