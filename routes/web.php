<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TesteController;
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

//middleware(LogAcessoMiddleware::class)

Route::get('/', [PrincipalController::class,'principal'])->name('site.index')->middleware('log.acesso'); // ->middleware('log.acesso') chama o apelido cadastrado no Kernel.php

Route::get('/sobre', [SobreController::class,'sobre'])->name('site.sobre');;
Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login'); // define o parametro erro como opcional
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedore', [FornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/produto', [ProdutoController::class,'index'])->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class,'teste'])->name('teste');

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
