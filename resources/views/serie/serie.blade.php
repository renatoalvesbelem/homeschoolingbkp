@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col">Série</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($series as $serie)
            <tr>
                <td></td>
                <td>{{$serie->nmSerie}}</td>
                <td>
                    <a href="{{ route('serie/editar',$serie->idSerie) }}"><span>Editar</span></a>
                    <a href="{{ route('serie/deletar',$serie->idSerie) }}"><span>Excluir</span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row justify-content-center align-items-center mt-4">{!! $series ->links() !!}</div>
@endsection
