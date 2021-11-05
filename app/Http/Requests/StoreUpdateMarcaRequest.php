<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMarcaRequest extends FormRequest
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
        $id = $this->segment(3);
        return [
            'nome' => "required|min:3|max:40|unique:marcas,nome,{$id},id",
            'imagem' => 'required|file|mimes:png,jpg,jpeg'
        ];
    }

    public function messages(){
        return [
            'required' => 'Prrencimento obrigatório',
            'nome.min' => 'O campo Nome deve contyer no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 40 caracteres',
            'nome.unique' => 'Este nome já existe. Insira outro nome',
            'imagem.mimes' => 'Extenção de arquivo inválida. São aceitas somente as extenções .png, .jpg, .jpeg'
        ];
    }
}
