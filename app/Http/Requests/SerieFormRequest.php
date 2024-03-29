<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerieFormRequest extends FormRequest
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
            'nmSerie' => 'required | min:3| max:100',
        ];
    }

    public function messages()
    {
        return [
            'nmSerie.required' => 'O campo Série é de preenchimento obrigatório',
            'nmSerie.min' => 'A quantidade de caracteres permitido é no mínimo 3 e máximo 100',
            'nmSerie.max' => 'A quantidade de caracteres permitido é no mínimo 3 e máximo 100'
        ];
    }
}
