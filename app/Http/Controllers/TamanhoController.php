<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TamanhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamanhos=\App\Tamanho::all();

        return view('tamanhos.listar')->with(compact('tamanhos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tamanhos.criar');
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

            'tamanho' => 'required',

        ], [

            'tamanho.required' => 'Tamanho.'

        ]);


        $tamanho = new \App\Tamanho;
        $tamanho->tamanho=$request->get('tamanho');
        $tamanho->save();
        return redirect('/tamanhos')->with('success', 'A informação foi adicionada');
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
        $tamanho = \App\Tamanho::find($id);
        return view('tamanhos.editar')->with(compact('tamanho','id'));
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

            'tamanho' => 'required',

        ], [
            'tamanho.required' => 'Tamanho.',


        ]);
        $tamanho= \App\Marca::find($id);
        $tamanho->tamanho=$request->get('nome');
        $tamanho->save();
        return redirect('/tamanhos')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamanho = \App\Tamanho::find($id);
        $tamanho->delete();
        return redirect('/tamanhos')->with('success','Tamanho Excluido');
    }
}
