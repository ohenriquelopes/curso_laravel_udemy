<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
//                'cnpj' => '00.000.000/0000-00',
                'cnpj' => '',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '22',
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'S',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '33',
                'telefone' => '0000-0000'
            ],
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
