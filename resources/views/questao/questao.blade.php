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
            <th scope="col">Questão</th>
            <th scope="col">Enunciado</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questaos as $questao)
            <tr>
                <td>{{$questao->idQuestao}}</td>
                <td>{{$questao->enunciadoQuestao}}</td>
                <td>
                    <a href="{{ route('questao/editar',$questao->idQuestao)}}"><span>Editar</span></a>
                    <a href="{{ route('questao/deletar',$questao->idQuestao)}}"
                       onclick="getConfirmation('{{$questao->enunciadoQuestao}}')"><span>Excluir</span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row justify-content-center align-items-center mt-4">{!! $questaos ->links() !!}</div>
@endsection
