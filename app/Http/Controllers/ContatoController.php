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

        $contato = new SiteContato();
        $contato->create($request->all());
        return view('site.contato', ['titulo' => 'Contato (teste)']);


    }
}
