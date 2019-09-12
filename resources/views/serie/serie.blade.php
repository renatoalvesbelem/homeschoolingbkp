@extends('layouts.app')

@section('content')
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
                <td>{{ Form::hidden('hiddenSerie', $serie->idSerie)}}</td>
                <td>{{$serie->nmSerie}}</td>
                <td>
                    <a href=""><span>Editar</span></a>
                    <a href=""><span>Excluir</span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row justify-content-center align-items-center mt-4">{!! $series ->links() !!}</div>

@endsection
