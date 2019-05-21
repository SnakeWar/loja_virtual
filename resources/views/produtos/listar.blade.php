@extends('layouts.dashboard')

@section('content')
    <div class="col-12 col-lg-6 mx-auto">
       {{-- @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif--}}
        <a class="btn btn-success botaohover" href="{{ URL::to('produtos/create') }}">Criar um Novo Produto</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descriçao</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Tamanho</th>
                <th colspan="2">Açoes</th>
            </tr>
            </thead>
            <tbody>

            @foreach($produtos as $produto)
                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr>
                    <td>{{$produto['id']}}</td>
                    <td>{{$produto['nome']}}</td>
                    <td>{{$produto['descricao']}}</td>
                    <td>{{$produto['preco']}}</td>
                    <td>{{$categoria = App\Categoria::find($produto['categoria_id'])->nome}}</td>
                    <td>{{$marca = App\Marca::find($produto['marca_id'])->nome}}</td>
                    <td>@if($produto['tamanho_id'] != null){{$tamanho = App\Tamanho::find($produto['tamanho_id'])->tamanho}}@endif</td>
                    <td><a href="{{action('ProdutoController@edit', $produto['id'])}}" class="btn btn-warning">EDITAR</a></td>
                    <td>
                        <form action="{{action('ProdutoController@destroy', $produto['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">EXCLUIR</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection