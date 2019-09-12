@extends('layouts.app')

@section('content')
    @if(isset($errors) & count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors -> all() as $erro)
                <p>{{$erro}}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open(['action' => 'Serie\SerieController@store']) !!}
    {!! Form::text('nmSerie', null, ['class' => 'form-control', 'placeholder'=>'Digite o nome da Série']) !!}
    {!! Form::submit('Salvar', ['class' => 'btn btn-outline-secondary']) !!}
    {!! Form::close() !!}
@endsection
