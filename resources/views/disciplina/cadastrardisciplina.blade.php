@extends('layouts.app')

@section('content')
    @if(isset($errors) & count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors -> all() as $erro)
                <p>{{$erro}}</p>
            @endforeach
        </div>
    @endif

    @if(isset($disciplina))
        {!! Form::model($disciplina, ['action' => ['Disciplina\DisciplinaController@update', $disciplina->idDisciplina],  'class' => 'form', 'method'=>'PUT']) !!}
    @else
        {!! Form::open(['action' => 'Disciplina\DisciplinaController@store']) !!}
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cadastro de Disciplina</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::text('nmDisciplina', old('name', isset($disciplina) ? $disciplina->nmDisciplina : null), ['class' => 'form-control', 'placeholder'=>'Digite o nome da Disciplina']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                {!! Form::submit(isset($disciplina)?'Alterar':'Salvar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
