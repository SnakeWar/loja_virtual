@extends('layouts.show')

@section('content')
    <div class="col-12 col-lg-12 mx-auto">
       {{-- @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif--}}
        <br>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Logradouro</th>
                <th>Numero</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th colspan="2">Açoes</th>
            </tr>
            </thead>
            <tbody>


                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr>
                    <td>{{$distribuidor['id']}}</td>
                    <td>{{$distribuidor['nome']}}</td>
                    <td>{{$telefone1 = App\Telefone::find($distribuidor['telefone_id'])->telefone1}}</td>
                    <td>{{$telefone2 = App\Telefone::find($distribuidor['telefone_id'])->telefone2}}</td>
                    <td>{{$logradouro = App\Endereco::find($distribuidor['endereco_id'])->logradouro}}</td>
                    <td>{{$numero = App\Endereco::find($distribuidor['endereco_id'])->numero}}</td>
                    <td>{{$complemento = App\Endereco::find($distribuidor['endereco_id'])->complemento}}</td>
                    <td>{{$bairro = App\Endereco::find($distribuidor['endereco_id'])->bairro}}</td>
                    <td>{{$cidade = App\Endereco::find($distribuidor['endereco_id'])->cidade}}</td>
                    <td>{{$uf = App\Endereco::find($distribuidor['endereco_id'])->uf}}</td>

                    <td><a href="{{action('DistribuidorController@edit', $distribuidor['id'])}}" class="btn btn-warning">EDITAR</a></td>
                    <td>
                        <form action="{{action('DistribuidorController@destroy', $distribuidor['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">EXCLUIR</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
        <a href="{{ URL::to('distribuidores') }}" class="btn btn-outline-success">VOLTAR</a>
    </div>
@endsection