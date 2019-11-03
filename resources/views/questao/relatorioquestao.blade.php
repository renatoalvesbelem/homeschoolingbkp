@extends('layouts.app')

@section('content')
    @if(isset($errors) & count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach($errors -> all() as $erro)
                <p>{{$erro}}</p>
            @endforeach
        </div>
    @endif
    {{--    {!! Form::open(['action' => 'Questao\QuestaoController@gerarRelatorio','method'=>'POST']) !!}--}}
    {!! Form::open(['method'=>'POST']) !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Gerar Provas</div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::select('idSerie', $series,  old('idSerie', isset($questao) ? $questao->idSerie: null) , ['class' => 'form-control', 'placeholder'=>'Selecione a Série', 'onchange'=>'ativarBotao()']) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                {!! Form::select('idDisciplina',$disciplinas , old('idSerie', isset($questao) ? $questao->idDisciplina: null) , ['class' => 'form-control',  'placeholder'=>'Selecione a Disciplina', 'onchange'=>'ativarBotao()']) !!}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                {!! Form::submit('Listar Questões', ['formaction'=>'gerarRelatorio','class' => 'btn btn-primary', 'id'=>'enviar', 'disabled'=> 'disabled']) !!}
                                {!! Form::submit('Imprimir Prova', ['formaction'=>'imprimirProva', 'formtarget'=>'_blank', 'class' => 'btn btn-primary', 'id'=>'imprimir', 'disabled'=> 'disabled']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (isset($questoes))
        @foreach($questoes as $questao)
            {{$questao->idQuestao}} ) {{$questao->enunciadoQuestao}}
            <br>
            <ol type="a">
                @foreach($questao->opcao as $op)
                    <li>{{$op->enunciadoOpcao}}</li>
                    <br>
                    @endforeach
                    </tr>
            </ol>
            <hr>
        @endforeach

    @endif
    {{--    <script text="text/javascript">--}}

    {{--        document.ready(function(){--}}
    {{--            $($("select[name='idSerie']")).change(function(){--}}
    {{--                var val = $('#enviar').val();--}}
    {{--                alert(val);--}}

    {{--                if (val == '') {--}}
    {{--                    $('#enviar').attr('disabled', 'disabled');--}}
    {{--                }else{--}}
    {{--                    $('#enviar').removeAttr('disabled');--}}
    {{--                }--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
    {!! Form::close() !!}

    <script>
        function ativarBotao() {
            //   alert((document.getElementsByName('idSerie')[0].getAttribute('value')));
            const serie = $("select[name='idSerie'] option:selected").val();
            const disciplina = $("select[name='idDisciplina'] option:selected").val();

            if (serie || disciplina) {
                $('#enviar').removeAttr('disabled');
                $('#imprimir').removeAttr('disabled');
            } else {
                $('#enviar').attr('disabled', 'disabled');
                $('#imprimir').attr('disabled', 'disabled');
            }
        }
    </script>
@endsection
