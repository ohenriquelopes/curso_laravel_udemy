<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste($p1, $p2)
    {
//        echo "a soma de $p1 + $p2 é: ".($p1+$p2);
//        return view('site.teste', ['x'=> $p1, 'y'=> $p2]); // array associativo
//        return view('site.teste', compact('p1', 'p2')); // compact('p1', 'p2') é o mesmo que ['p1'=> $p1, 'p2'=> $p2]
        return view('site.teste')->with('xyz',$p1)->with('abc',$p2); // with('nome da variavel', 'valor da variavel'
    }

}
