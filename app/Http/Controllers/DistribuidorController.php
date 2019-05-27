<?php

namespace App\Http\Controllers;

use App\Distribuidor;
use App\Endereco;
use App\Telefone;
use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribuidores = Distribuidor::all();
       /* $telefones = Telefone::all();
        $endereco = Endereco::all();*/
        return view('distribuidores.listar')/*->with(compact('telefones'))->with(compact('endereco'))*/->with(compact('distribuidores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distribuidores.criar');
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
            'telefone1' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'nome' => 'required'
        ], [
            'nome.required' => 'Nome.',
            'telefone1.required' => 'Telefone.',
            'logradouro.required' => 'Logradouro.',
            'bairro.required' => 'Bairro.',
            'cidade.required' => 'Cidade.',
            'uf.required' => 'UF.'
        ]);
        $telefones = new Telefone;
        $endereco = new Endereco;
        $distribuidor = new Distribuidor;
        $endereco->logradouro=$request->get('logradouro');
        $endereco->numero=$request->get('numero');
        $endereco->complemento=$request->get('complemento');
        $endereco->bairro=$request->get('bairro');
        $endereco->cidade=$request->get('cidade');
        $endereco->uf=$request->get('uf');
        $telefones->telefone1=$request->get('telefone1');
        $telefones->telefone2=$request->get('telefone2');
        $telefones->save();
        $endereco->save();
        $distribuidor->nome=$request->get('nome');
        $distribuidor->endereco_id = $endereco->id;
        $distribuidor->telefone_id = $telefones->id;
        $distribuidor->save();
        return redirect('/distribuidores')->with('success', 'A informação foi adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distribuidor = Distribuidor::find($id);
        $endereco = Distribuidor::find($id)->endereco;
        $telefones = Distribuidor::find($id)->telefones;
        return view('distribuidores.mostrar')->with(compact('distribuidor','id'))->with(compact('endereco'))->with(compact('telefones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distribuidor = Distribuidor::find($id);
        $endereco = Distribuidor::find($id)->endereco;
        $telefones = Distribuidor::find($id)->telefones;
        return view('distribuidores.editar')->with(compact('distribuidor','id'))->with(compact('endereco'))->with(compact('telefones'));
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
            'telefone1' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'nome' => 'required'
        ], [
            'nome.required' => 'Nome.',
            'telefone1.required' => 'Telefone.',
            'logradouro.required' => 'Logradouro.',
            'bairro.required' => 'Bairro.',
            'cidade.required' => 'Cidade.',
            'uf.required' => 'UF.'
        ]);
        $distribuidor = Distribuidor::find($id);
        $telefones = Telefone::find($distribuidor->telefone_id);
        $endereco = Endereco::find($distribuidor->endereco_id);
        $endereco->logradouro=$request->get('logradouro');
        $endereco->numero=$request->get('numero');
        $endereco->complemento=$request->get('complemento');
        $endereco->bairro=$request->get('bairro');
        $endereco->cidade=$request->get('cidade');
        $endereco->uf=$request->get('uf');
        $telefones->telefone1=$request->get('telefone1');
        $telefones->telefone2=$request->get('telefone2');
        $telefones->save();
        $endereco->save();
        $distribuidor->nome=$request->get('nome');
        $distribuidor->endereco_id = $endereco->id;
        $distribuidor->telefone_id = $telefones->id;
        $distribuidor->save();
        return redirect('/distribuidores')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distribuidor = \App\Distribuidor::find($id);
        $distribuidor->delete();
        return redirect('/distribuidores')->with('success','Distribuidora Excluida');
    }
}
