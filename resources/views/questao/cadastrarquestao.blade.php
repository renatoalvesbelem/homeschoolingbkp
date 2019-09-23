@extends('layouts.app')

@section('content')
    @if(isset($errors) & count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors -> all() as $erro)
                <p>{{$erro}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['action' => 'Questao\QuestaoController@store']) !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cadastro de Séries</div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::select('idSerie', $series,  old('idSerie', isset($questao) ? $questao->idSerie: null) , ['class' => 'form-control', 'placeholder'=>'Selecione a Série']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::select('idDisciplina',$disciplinas , old('idSerie', isset($questao) ? $questao->idDisciplina: null) , ['class' => 'form-control',  'placeholder'=>'Selecione a Disciplina']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::textarea('enunciadoQuestao', old('enunciadoQuestao', isset($questao) ? $questao->enunciadoQuestao: null), ['class' => 'form-control', 'placeholder'=>'Digite o enunciado da questão', 'rows'=>'4']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::textarea('respostaQuestao',old('respostaQuestao', isset($questao) ? $questao->respostaQuestao: null), ['class' => 'form-control', 'placeholder'=>'Digite a resposta da questão', 'rows'=>'4']) !!}
                            </div>
                        </div>

                        <div class="form-group row">Opções</div>
                        <hr>
                        <div id="opcoes"></div>
                        <div class="form-group row">
                            <a href="javascript:addTextArea()" id="adicionar">Adicionar</a>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                {!! Form::submit(isset($questao)?'Alterar':'Salvar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        function addTextArea() {
            var opcao = $("#opcoes");
            opcao.append("<div class='form-group row'><div class='col-md-12'><textarea name='opcao[]' class='form-control' placeholder='Digite a opção' rows='4'>");
            opcao.append("<div class='form-group row mb-0'>  <div class='col-md-8'> <input type='hidden' name='opcaoCorreta[]' value='0'><input type='checkbox' onclick='this.previousSibling.value=1-this.previousSibling.value'> Opção correta?");
        }
    </script>
    {!! Form::close() !!}
@endsection
