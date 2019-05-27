@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Editar um Produto</h2><br  />

        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>Campos obrigatórios</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{action('ProdutoController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{$produto->nome}}" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Descriçao:</label>
                    <input type="text" class="form-control" name="descricao" value="{{$produto->descricao}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Preço:</label>
                    <input type="text" class="form-control" name="preco" value="{{$produto->preco}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Categoria:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px;" name="categoria">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria['id']}}" @if($categoria['id']==$produto->categorai_id) selected @endif>{{$categoria['nome']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Marca:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px;" name="marca">
                        @foreach($marcas as $marca)
                            <option value="{{$marca['id']}}" @if($marca['id']==$produto->marca_id) selected @endif>{{$marca['nome']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="name">Tamanho:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px;" name="tamanho">
                        @foreach($tamanhos as $tamanho)
                            <option value="{{$tamanho['id']}}" @if($tamanho['id']==$produto->tamanho_id) selected @endif>{{$tamanho['tamanho']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-2" style="margin-top:0px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">ATUALIZAR</button>
                </div>
                <div class="form-group col-md-2" style="margin-top:0px">
                    <a href="{{URL::to('produtos')}}" class="btn btn-danger" style="margin-left:38px">VOLTAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection