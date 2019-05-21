<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos=\App\Produto::all();
        return view('produtos.listar')->with(compact('produtos'))->with(compact('categorias'))->with(compact('marcas'))->with(compact('tamanhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=\App\Categoria::all();
        $marcas=\App\Marca::all();
        $tamanhos=\App\Tamanho::all();
        return view('produtos.criar')->with(compact('categorias'))->with(compact('marcas'))->with(compact('tamanhos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->validate([

            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'categoria' => 'required',
            'marca' => 'required',

        ], [

            'nome.required' => 'Nome da Categoria.',
            'descricao.required' => 'Descricao.',
            'preco.required' => 'Preco.',
            'categoria.required' => 'Categoria.',
            'marca.required' => 'Nome da Marca.'

        ]);


        $produto = new \App\Produto;
        $produto->nome=$request->get('nome');
        $produto->descricao=$request->get('descricao');
        $produto->preco=$request->get('preco');
        $produto->categoria_id=$request->get('categoria');
        $produto->marca_id=$request->get('marca');
        $produto->tamanho_id=$request->get('tamanho');
        $produto->save();
        return redirect('/produtos')->with('success', 'A informação foi adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias=\App\Categoria::all();
        $marcas=\App\Marca::all();
        $tamanhos=\App\Tamanho::all();
        $produto = \App\Produto::find($id);
        return view('produtos.editar')->with(compact('produto', 'id'))->with(compact('categorias'))->with(compact('marcas'))->with(compact('tamanhos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = request()->validate([

            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'categoria' => 'required',
            'marca' => 'required',
            'tamanho' => 'required'

        ], [

            'nome.required' => 'Nome da Categoria.',
            'descricao.required' => 'Descricao.',
            'preco.required' => 'Preco.',
            'categoria.required' => 'Categoria.',
            'marca.required' => 'Nome da Marca.',
            'tamanho.required' => 'Tamanho.'

        ]);

        $produto= \App\Produto::find($id);
        $produto->nome=$request->get('nome');
        $produto->descricao=$request->get('descricao');
        $produto->preco=$request->get('preco');
        $produto->categoria_id=$request->get('categoria');
        $produto->marca_id=$request->get('marca');
        $produto->tamanho_id=$request->get('tamanho');
        $produto->save();
        return redirect('/produtos')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = \App\Produto::find($id);
        $produto->delete();
        return redirect('/produtos')->with('success','Produto Excluido');
    }
}
