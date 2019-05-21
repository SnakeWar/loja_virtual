@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Criar um novo Tamanho</h2><br/>

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

        <form method="post" action="{{url('tamanhos')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="Name">Tamanho:</label>
                    <input type="text" class="form-control" name="tamanho">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-2" style="margin-top:5px">
                    <button type="submit" class="btn btn-success">ADICIONAR</button>
                </div>
                <div class="form-group col-md-2" style="margin-top: 5px;">
                    <a class="btn btn-danger" href="{{ URL::to('tamanhos') }}">VOLTAR</a>
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