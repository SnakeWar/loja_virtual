<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas=\App\Marca::all();

        return view('marcas.listar')->with(compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('marcas.criar');
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

            'nome.required' => 'Nome da Marca.'

        ]);


        $marca = new \App\Marca;
        $marca->nome=$request->get('nome');
        $marca->save();
        return redirect('/marcas')->with('success', 'A informação foi adicionada');
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
        $marca = \App\Marca::find($id);
        return view('marcas.editar')->with(compact('marca','id'));
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
            'nome.required' => 'Nome da Marca.',


        ]);
        $marca= \App\Marca::find($id);
        $marca->nome=$request->get('nome');
        $marca->save();
        return redirect('/marcas')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = \App\Marca::find($id);
        $marca->delete();
        return redirect('/marcas')->with('success','Marca Excluida');
    }
}
