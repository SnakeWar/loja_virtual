<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Loja;
use App\Telefone;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lojas = Loja::all();
       /* $telefones = Telefone::all();
        $endereco = Endereco::all();*/

        return view('lojas.listar')/*->with(compact('telefones'))->with(compact('endereco'))*/->with(compact('lojas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('lojas.criar');
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

            'filial' => 'required',
            'telefone1' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'nome' => 'required'

        ], [

            'nome.required' => 'Filial.',
            'telefone1.required' => 'Telefone.',
            'logradouro.required' => 'Logradouro.',
            'bairro.required' => 'Bairro.',
            'cidade.required' => 'Cidade.',
            'uf.required' => 'UF.'

        ]);

        $telefones = new Telefone;
        $endereco = new Endereco;
        $loja = new Loja;

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
        $loja->filial=$request->get('filial');
        $loja->endereco_id = $endereco->id;
        $loja->telefone_id = $telefones->id;
        $loja->save();

        return redirect('/lojas')->with('success', 'A informação foi adicionada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loja = Loja::find($id);
        $endereco = Loja::find($id)->endereco;
        $telefones = Loja::find($id)->telefones;
        return view('lojas.mostrar')->with(compact('loja','id'))->with(compact('endereco'))->with(compact('telefones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loja = Loja::find($id);
        $endereco = Loja::find($id)->endereco;
        $telefones = Loja::find($id)->telefones;
        return view('lojas.editar')->with(compact('loja','id'))->with(compact('endereco'))->with(compact('telefones'));
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

            'filial' => 'required',
            'telefone1' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
        ], [

            'nome.required' => 'Nome.',
            'telefone1.required' => 'Telefone.',
            'logradouro.required' => 'Logradouro.',
            'bairro.required' => 'Bairro.',
            'cidade.required' => 'Cidade.',
            'uf.required' => 'UF.'

        ]);

        $loja = Loja::find($id);
        $telefones = Telefone::find($loja->telefone_id);
        $endereco = Endereco::find($loja->endereco_id);

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
        $loja->filial=$request->get('filial');
        $loja->endereco_id = $endereco->id;
        $loja->telefone_id = $telefones->id;
        $loja->save();

        return redirect('/lojas')->with('success', 'A informação foi atualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loja = \App\Loja::find($id);
        $loja->delete();
        return redirect('/lojas')->with('success','Loja Excluida');
    }
}
