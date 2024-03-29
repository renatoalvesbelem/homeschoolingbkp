<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaFormRequest extends FormRequest
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
            'nmDisciplina' => 'required | min:3| max:100',
        ];
    }

    public function messages()
    {
        return [
            'nmDisciplina.required' => 'O campo Disciplina é de preenchimento obrigatório',
            'nmDisciplina.min' => 'A quantidade de caracteres permitido é no mínimo 3 e máximo 100',
            'nmDisciplina.max' => 'A quantidade de caracteres permitido é no mínimo 3 e máximo 100'
        ];
    }
}
