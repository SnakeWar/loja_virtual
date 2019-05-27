@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Editar um Distribuidor</h2><br  />

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

        <form method="post" action="{{action('DistribuidorController@update', $id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Nome da Distribuidora*:</label>
                    <input type="text" class="form-control" name="nome" value="{{$distribuidor['nome']}}" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Telefone*:</label>
                    <input type="text" class="form-control" name="telefone1" value="{{$telefones['telefone1']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Telefone 2:</label>
                    <input type="text" class="form-control" name="telefone2" value="{{$telefones['telefone2']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Logradouro*:</label>
                    <input type="text" class="form-control" name="logradouro" value="{{$endereco['logradouro']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Numero:</label>
                    <input type="text" class="form-control" name="numero" value="{{$endereco['numero']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Complemento:</label>
                    <input type="text" class="form-control" name="complemento" value="{{$endereco['complemento']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Bairro*:</label>
                    <input type="text" class="form-control" name="bairro" value="{{$endereco['bairro']}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Cidade*:</label>
                    <select class="form-control" name="cidade">
                        <option value="{{$endereco['cidade']}}">{{$endereco['cidade']}}</option>
                        <option value="Natal">Natal</option>
                        <option value="Parnamirim">Parnamirim</option>
                        <option value="Macaiba">Macaiba</option>
                        <option value="Sao Jose">Sao Jose</option>
                        <option value="Canguaretama">Canguaretama</option>
                        <option value="Ceara-Mirim">Ceara-Mirim</option>
                        <option value="Nisia Floresta">Nisia Floresta</option>
                        <option value="Goianinha">Goianinha</option>
                        <option value="Arez">Arez</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">UF*:</label>
                    <select class="form-control" name="uf">
                        <option value="{{$endereco['uf']}}">{{$endereco['uf']}}</option>
                        <option value="RN">RN</option>
                        <option value="PB">PB</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="CE">CE</option>
                        <option value="MA">MA</option>
                        <option value="BA">BA</option>
                        <option value="SE">SE</option>
                        <option value="AL">AL</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-2" style="margin-top:5px">
                    <button type="submit" class="btn btn-success">ATUALIZAR</button>
                </div>
                <div class="form-group col-md-2" style="margin-top: 5px;">
                    <a class="btn btn-danger" href="{{ URL::to('distribuidores') }}">VOLTAR</a>
                </div>
            </div>
        </form>
    </div>
@endsection