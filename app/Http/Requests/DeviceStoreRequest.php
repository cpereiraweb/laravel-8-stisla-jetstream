<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceStoreRequest extends FormRequest
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
            "cliente" => "required",
            "nome" => "required|unique:devices,nome",
            "descricao" => "nullable",
            "data_ativacao" => "date_format:Y-m-d|nullable",
        ];
    }

    public function messages()
{
    return [
        'cliente.required' => 'Informe o Cliente',
        'nome.required' => 'Informe o Nome do Projeto',
        'nome.unique' => 'Já existe um projeto com esse nome',
        'data_ativacao.date_format' => 'Data em formato inválido',
    ];
}
}
