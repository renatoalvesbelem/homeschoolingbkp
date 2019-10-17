<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealatorioQuestaoFormRequest extends FormRequest
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
            'idSerie' => 'required',
            'idDisciplina' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'idSerie.required' => 'Série deve ser selecionada',
            'idDisciplina.required' => 'Disciplina deve ser selecionada',
        ];
    }
}
