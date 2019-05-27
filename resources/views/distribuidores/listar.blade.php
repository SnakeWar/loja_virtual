@extends('layouts.dashboard')

@section('content')
    <div class="col-12 col-lg-12 mx-auto">
       {{-- @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif--}}
        <a class="btn btn-success botaohover" href="{{ URL::to('distribuidores/create') }}">Criar um Novo Distribuidor</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th colspan="2">Açoes</th>
            </tr>
            </thead>
            <tbody>

            @foreach($distribuidores as $distribuidor)
                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr>
                    <td>{{$distribuidor['id']}}</td>
                    <td>{{$distribuidor['nome']}}</td>
                    <td>{{$telefone1 = App\Telefone::find($distribuidor['telefone_id'])->telefone1}}</td>
                    <td>{{$telefone2 = App\Telefone::find($distribuidor['telefone_id'])->telefone2}}</td>
                    <td><a href="{{action('DistribuidorController@show', $distribuidor['id'])}}" class="btn btn-success">VER</a></td>
                    <td><a href="{{action('DistribuidorController@edit', $distribuidor['id'])}}" class="btn btn-warning">EDITAR</a></td>
                    <td>
                        <form action="{{action('DistribuidorController@destroy', $distribuidor['id'])}}" method="post">
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