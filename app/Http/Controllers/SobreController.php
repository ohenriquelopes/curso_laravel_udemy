<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends Controller
{

    // faz o controller passar pelo middleware usando o apelido no arquivo kernel.php
    public function __construct()
    {
        $this->middleware('log.acesso');
    }

    public function sobre()
    {
        return view('site.sobre');
    }
}
