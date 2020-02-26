<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InserirContatoRequest;
use App\Contato;

class ContatoController extends Controller
{
    public function inserir(InserirContatoRequest $request) {
        
        try {
            $url_arquivo = "aaa";
            // Storage::disk('local')->put('file.txt', 'Contents');

            $contato = new Contato();
            $contato->nome        = $request->nome;
            $contato->email       = $request->email;
            $contato->telefone    = $request->telefone;
            $contato->mensagem    = $request->mensagem;
            $contato->url_arquivo = $url_arquivo;
            $contato->save();

        } catch(\Exception $e) {
            abort(422);
        }
    
        return response();
    }

    public function recuperar() {
        $contatos = Contato::all();
        return response()->json(compact($contatos));
    }

}
