<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InserirContatoRequest extends FormRequest
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
            'nome'     => 'required|max:255|string',
            'email'    => 'required|max:100|email',
            'telefone' => 'required|max:11|string',
            'mensagem' => 'required|max:1000|string',
            'arquivo'  => 'required|file|mimes:pdf,doc,docx,odt,txt|max:500',
        ];
    }
}
