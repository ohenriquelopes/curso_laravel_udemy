<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
|    verbos HTTP
    GET: obter dados
    POST: enviar dados
    PUT: atualizar dados
    DELETE: deletar dados
    PATCH: atualizar dados
    OPTIONS: obter metodos suportados

Route::get('/contato/{nome}/{cat_id}', function(string $nome, int $cat_id = 1){
    echo 'estamos aqui '.$nome. ' '.$cat_id;
})  ->where('cat_id','[0-9]+')
    ->where('nome','[A-Za-z]+')
;

*/
//
//Route::get('/', function () {
//    return 'ola, seja bem vindo ao curso';
//});

Route::middleware(LogAcessoMiddleware::class)
    ->get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])
    ->name('site.index');

Route::get('/sobre', [\App\Http\Controllers\SobreController::class,'sobre'])->name('site.sobre');;
Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');
Route::get('/login', function(){return 'login';})->name('login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'clientes';})->name('clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class,'index'])->name('fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('produtos');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class,'teste'])->name('teste');

Route::fallback(function(){
    echo 'a rota acessada nao existe. <a href="'.route('site.index').'"> clique aqui</a> para ir para a pagina inicial';
});



//Route::get('/rota1', function(){
//    echo 'rota 1';
//})->name('site.rota1');

//Route::redirect('/rota2', '/rota1'); // redirect('origem', 'destino')

//Route::get('/rota2', function(){
//    return redirect()->route('site.rota1');
//})->name('site.rota2');
