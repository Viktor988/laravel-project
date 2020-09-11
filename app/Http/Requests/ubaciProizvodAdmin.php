<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ubaciProizvodAdmin extends FormRequest
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
           'karakteristike'=>'regex:[([A-đčćž0-9\s]+,[A-zćčšđž0-9\s]+){8}]',
           'model'=>'regex:[[A-z0-9\s]+]',
           'cena'=>'regex:[[0-9]+]',
           'slika'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'karakteristike.regex' => 'Karakteristike nisu u dobrom formatu!',
            'model.regex' => 'Model nije u dobrom formatu!',
            'cena.regex' => 'Cena nije u dobrom formatu!',
            'image.regex' => 'Slika nije u dobrom formatu!',
            'slika.required' => 'Slika je obavezna!',
            'slika.max' => 'Slika je velikog formata!'

        ];
    }
}
