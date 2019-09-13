@extends('layouts.app')

@section('content')
    @if(isset($errors) & count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors -> all() as $erro)
                <p>{{$erro}}</p>
            @endforeach
        </div>
    @endif

    @if(isset($serie))
        {!! Form::model($serie, ['action' => ['Serie\SerieController@update', $serie->idSerie],  'class' => 'form', 'method'=>'PUT']) !!}
    @else
        {!! Form::open(['action' => 'Serie\SerieController@store']) !!}
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cadastro de Séries</div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::text('nmSerie', old('name', isset($serie) ? $serie->nmSerie : null), ['class' => 'form-control', 'placeholder'=>'Digite o nome da Série']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
