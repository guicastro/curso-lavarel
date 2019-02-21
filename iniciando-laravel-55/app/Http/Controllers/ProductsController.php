<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function Cadastrar() {

        $titulo = "Cadastrar";
        $texto = "Teste";
        $array = array('chave1' => 1,
                        'chave2' => 3,
                        'chave3' => 6);

        return view('products.geral')
                ->with('titulo', $titulo)
                ->with('texto', $texto)
                ->with('array1', $array);

    }

    public function Listar() {

        $products = Product::all();

        return view('products.list', compact('products'));

    }

    public function formCadastrar() {
        
        return view('products.create');

    }

    public function formEditar($id) {
        
        //BUSCA O PRODUTO PELO ID
        $product = Product::find($id);

        /*### SE NÃO LOCALIZAR, ABORTA ###*/
        if(!$product) {

            abort(404);
        }
        /*### SE NÃO LOCALIZAR, ABORTA ###*/

        //ABRE A VIEW DE EDIÇÃO
        return view('products.edit', compact('product'));

    }

    public function Salvar(Request $request) {
        
        /*### CHAMA O MODEL E SALVA OS DADOS ###*/
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        /*### CHAMA O MODEL E SALVA OS DADOS ###*/

        //REDIRECIONA APÓS SALVAR
        return redirect()->to('/admin/produtos/listar');

    }


    public function Alterar(Request $request, $id) {
        
        //BUSCA O PRODUTO PELO ID
        $product = Product::find($id);

        /*### SE NÃO LOCALIZAR, ABORTA ###*/
        if(!$product) {

            abort(404);
        }
        /*### SE NÃO LOCALIZAR, ABORTA ###*/

        /*### CHAMA O MODEL E SALVA OS DADOS ###*/
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        /*### CHAMA O MODEL E SALVA OS DADOS ###*/

        //REDIRECIONA APÓS SALVAR
        return redirect()->to('/admin/produtos/listar');

    }

    public function Excluir($id) {
        
        //BUSCA O PRODUTO PELO ID
        $product = Product::find($id);

        /*### SE NÃO LOCALIZAR, ABORTA ###*/
        if(!$product) {

            abort(404);
        }
        /*### SE NÃO LOCALIZAR, ABORTA ###*/

        /*### CHAMA O MODEL E SALVA OS DADOS ###*/
        $product->delete();
        /*### CHAMA O MODEL E SALVA OS DADOS ###*/

        //REDIRECIONA APÓS SALVAR
        return redirect()->to('/admin/produtos/listar');

    }
}
