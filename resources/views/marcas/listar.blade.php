@extends('layouts.dashboard')

@section('content')
    <div class="col-12 col-lg-6 mx-auto">
       {{-- @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif--}}
        <a class="btn btn-success botaohover" href="{{ URL::to('marcas/create') }}">Criar uma Nova Marca</a>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th colspan="2">Açoes</th>
            </tr>
            </thead>
            <tbody>

            @foreach($marcas as $marca)
                {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
                {{--@endphp--}}
                <tr>
                    <td>{{$marca['id']}}</td>
                    <td>{{$marca['nome']}}</td>
                    <td><a href="{{action('MarcaController@edit', $marca['id'])}}" class="btn btn-warning">EDITAR</a></td>
                    <td>
                        <form action="{{action('MarcaController@destroy', $marca['id'])}}" method="post">
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