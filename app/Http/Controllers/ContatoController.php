<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
//        var_dump($_POST);
//        echo '<pre>';
//        print_r($request->all());
//        echo '</pre>';
//        echo $request->input('nome');
//        echo '<br>';
//        echo $request->input('email');

//        $contato = new SiteContato();
//        $contato->create($request->all());

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
//        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
        return view('site.contato', compact('motivo_contatos'));

    }

    public function salvar(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ], [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.email' => 'O campo email não foi preenchido corretamente',
            'motivo_contatos_id.required' => 'O campo motivo de contato precisa ser preenchido',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',
        ]);
        $contato = new SiteContato();
        $contato->create($request->all());


//        SiteContato()::create($request->all());
    }
}
