<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=\App\Categoria::all();

        return view('categorias.listar')->with(compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('categorias.criar');
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

        ], [

            'nome.required' => 'Nome da Categoria.'

        ]);


        $categoria = new \App\Categoria;
        $categoria->nome=$request->get('nome');
        $categoria->save();
        return redirect('/categorias')->with('success', 'A informação foi adicionada');
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
        $categoria = \App\Categoria::find($id);
        return view('categorias.editar')->with(compact('categoria','id'));
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

        ], [
            'nome.required' => 'Nome da Categoria.',


        ]);
        $categoria= \App\Categoria::find($id);
        $categoria->nome=$request->get('nome');
        $categoria->save();
        return redirect('/categorias')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = \App\Categoria::find($id);
        $categoria->delete();
        return redirect('/categorias')->with('success','Categoria Excluida');
    }
}
