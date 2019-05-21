@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Criar um novo Produto</h2><br/>

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

        <form method="post" action="{{url('produtos')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Nome da Produto:</label>
                    <input type="text" class="form-control" name="nome">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Nome da Descriçao:</label>
                    <input type="text" class="form-control" name="descricao">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Preço:</label>
                    <input type="text" class="form-control" name="preco">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Nome da Categoria:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="categoria">
                        <option value="">Selecione</option>
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria['id']}}">{{$categoria['nome']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Nome da Marca:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="marca">
                        <option value="">Selecione</option>
                        @foreach($marcas as $marca)
                            <option value="{{$marca['id']}}">{{$marca['nome']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Tamanho:</label>
                    <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="tamanho">
                        <option value="">Selecione</option>
                        @foreach($tamanhos as $tamanho)
                            <option value="{{$tamanho['id']}}">{{$tamanho['tamanho']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-2" style="margin-top:5px">
                    <button type="submit" class="btn btn-success">ADICIONAR</button>
                </div>
                <div class="form-group col-md-2" style="margin-top: 5px;">
                    <a class="btn btn-danger" href="{{ URL::to('produtos') }}">VOLTAR</a>
                </div>
            </div>
        </form>
    </div>
    {{--<script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
    </script>--}}
@endsection