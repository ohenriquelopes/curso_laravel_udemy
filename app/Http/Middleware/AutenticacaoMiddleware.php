<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo $metodo_autenticacao.' - '.$perfil.'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'verificando autenticacao padrao '.$perfil.'<br>';
        } else {
            echo 'verificando autenticacao alternativa '.$perfil.'<br>';
        }

        if($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos do site'.'<br>';
        }

        if(true){
            return $next($request);
        } else {
            return Response('Acesso negado! Rota existe autenticacao');
        }
//        return $next($request);

    }

}
