@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Editar uma Categoria</h2><br  />

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

        <form method="post" action="{{action('CategoriaController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Categoria:</label>
                    <input type="text" class="form-control" name="nome" value="{{$categoria->nome}}" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-2" style="margin-top:0px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">ATUALIZAR</button>
                </div>
                <div class="form-group col-md-2" style="margin-top:0px">
                    <a href="{{URL::to('categorias')}}" class="btn btn-danger" style="margin-left:38px">VOLTAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection