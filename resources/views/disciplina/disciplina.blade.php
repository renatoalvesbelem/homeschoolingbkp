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
        @foreach($disciplinas as $disciplina)
            <tr>
                <td></td>
                <td>{{$disciplina->nmDisciplina}}</td>
                <td>
                    <a href="{{ route('disciplina/editar',$disciplina->idDisciplina)}}"><span>Editar</span></a>
                    <a href="{{ route('disciplina/deletar',$disciplina->idDisciplina)}}"
                       onclick="getConfirmation('{{$disciplina->nmDisciplina}}')"><span>Excluir</span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row justify-content-center align-items-center mt-4">{!! $disciplinas ->links() !!}</div>
@endsection
