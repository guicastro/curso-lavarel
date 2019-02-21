<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//CLASSE DE INTERPRETAÇÃO DE REQUEST DO LARAVEL
Use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/*#### ROTA PADRÃO ####*/
Route::get('/teste', function () {
    echo "<pre>Teste: ";
    print_r($_REQUEST);
    echo "</pre>";
});
/*#### ROTA PADRÃO ####*/


/*#### ROTA COM PARÂMETRO ####*/
Route::get('/teste/{id}', function ($id) {
    echo "<pre>Teste do ID: ";
    echo $id;   
    echo "</pre>";
});
/*#### ROTA COM PARÂMETRO ####*/



/*#### ROTA COM MAIS DE UM PARÂMETRO ####*/
Route::get('/teste/{id}/{cat}', function ($id, $cat) {
    echo "<pre>Teste do ID: ";
    echo $id;   
    echo "<br>Cat: ";
    echo $cat;   
    echo "</pre>";
});
/*#### ROTA COM MAIS DE UM PARÂMETRO ####*/



/*#### ROTA COM PARÂMETRO OPCIONAL ####*/
Route::get('/teste2/{id}/{cat?}', function ($id, $cat = "") {
    echo "<pre>Teste do ID: ";
    echo $id;   
    echo "<br>Cat (opcional): ";
    echo $cat;   
    echo "</pre>";
});
/*#### ROTA COM PARÂMETRO OPCIONAL ####*/




/*#### ROTA COM FORMULÁRIO DE CADASTRO ####*/
Route::get('/cliente', function () {

    $csrfToken = csrf_token();
    
    $html = <<<HTML
<html>
    <body>
        <h1>Cliente</h1>
        <form method="post" action="./cliente/cadastrar">
            <input type="text" name="name" />
            <input type="hidden" name="_token" value="$csrfToken" />
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>
HTML;
    return $html;
});
/*#### ROTA COM FORMULÁRIO DE CADASTRO ####*/



/*#### ROTA QUE IRÁ PROCESSAR O CADASTRO DO CLIENTE ####*/
Route::post('/cliente/cadastrar', function (Request $request) {

    echo "<pre>Cliente cadastrado: ";
    // print_r($_REQUEST);
    echo "<br>get: ".$request->get('name');
    echo "<br>name: ".$request->name;
    echo "</pre>";

});
/*#### ROTA QUE IRÁ PROCESSAR O CADASTRO DO CLIENTE ####*/



/*#### ROTA DE FORMULÁRIO DE CADASTRO DE FORNECEDOR COM VIEW ####*/
Route::get('/fornecedor', function () {

    $var1 = "teste1";
    $var2 = "teste2";
    
    // return view('fornecedor', [ 'var1' => $var1, 'var2' => $var2]);
    // return view('fornecedor', compact('var1', 'var2'));
    return view('fornecedor')
            ->with('var1', $var1)
            ->with('var2', $var2);

});
/*#### ROTA DE FORMULÁRIO DE CADASTRO DE FORNECEDOR COM VIEW ####*/


/*#### TESTE COM BLADE ####*/
Route::get('/testando', function () {

    $var1 = "teste1";
    $var2 = "teste2";
    $var3 = 3;
    $var4 = "alguma coisa";
    
    return view('testando')
            ->with('var1', $var1)
            ->with('var2', $var2)
            ->with('var3', $var3)
            ->with('var4', $var4);
});
/*#### TESTE COM BLADE ####*/



/*#### TESTE 2 COM BLADE ####*/
Route::get('/for-if/{var1?}', function ($var1 = "") {

    $array = array('chave1' => 1,
                    'chave2' => 3,
                    'chave3' => 6);
    $array = array();

    return view('for-if')
            ->with('var1', $var1)
            ->with('array1', $array);
});
/*#### TESTE 2 COM BLADE ####*/



/*#### TESTE DE CONTROLLER ####*/
//Route::get('produtos/cadastrar', 'ProductsController@Cadastrar');
/*#### TESTE DE CONTROLLER ####*/


/*#### TESTE DE AGRUPAMENTO DE ROTAS SIMPLES ####*/
Route::group(['prefix' => '/'], function() {

    Route::get('produtos/listar', 'ProductsController@Listar');
});
/*#### TESTE DE AGRUPAMENTO DE ROTAS SIMPLES ####*/

/*#### TESTE DE AGRUPAMENTO DE ROTAS COM AGRUPAMENTO INTERNO ####*/
Route::group(['prefix' => '/admin'], function() {

    Route::group(['prefix' => '/produtos'], function() {

        Route::get('listar', 'ProductsController@Listar');
        
        Route::get('cadastrar', 'ProductsController@formCadastrar');
        Route::post('salvar', 'ProductsController@Salvar');

        Route::get('{id}/editar', 'ProductsController@formEditar');
        Route::post('{id}/alterar', 'ProductsController@Alterar');

        Route::get('{id}/excluir', 'ProductsController@Excluir');
    });
});
/*#### TESTE DE AGRUPAMENTO DE ROTAS COM AGRUPAMENTO INTERNO ####*/