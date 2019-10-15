<?php

namespace App\Http\Controllers\Questao;

use App\Http\Requests\QuestaoFormRequest;
use App\Model\Disciplina;
use App\Model\Opcao;
use App\Model\Questao;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $questao;

    public function __construct(Questao $questao)
    {
        $this->middleware('auth');
        $this->questao = $questao;
    }

    public function index()
    {
        $questaos = $this->questao->orderby('idQuestao')->paginate(10);
        return view('questao.questao', compact('questaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $series = Serie::pluck('nmSerie', 'idSerie');
        $disciplinas = Disciplina::pluck('nmDisciplina', 'idDisciplina');
        return view('questao.cadastrarquestao', compact('series', 'disciplinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questao = new Questao(
            [
                'enunciadoQuestao' => $request['enunciadoQuestao'],
                'respostaQuestao' => $request['respostaQuestao'],
                'idSerie' => $request['idSerie'],
                'idDisciplina' => $request['idDisciplina'],
            ]);

        for ($i = 0; $i < count($request['opcao']); $i++) {
            $opcoes[] = new Opcao(
                [
                    'enunciadoOpcao' => $request['opcao'][$i],
                    'corretaOpcao' => $request['opcaoCorreta'][$i]
                ]);
        }
        DB::beginTransaction();
        try {
            $questao->save();
            $questao->opcao()->saveMany($opcoes);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
        }
        return redirect()->route('questao');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $series = Serie::pluck('nmSerie', 'idSerie');
        $disciplinas = Disciplina::pluck('nmDisciplina', 'idDisciplina');
        $questao = questao::find($id);
        $questao->opcao;

        return view('questao.cadastrarquestao', compact('questao','series','disciplinas')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestaoFormRequest $request, $id)
    {
        $dataForm = $request->except('_token');
        $questao = $this->questao->find($id);
        $questao->update($dataForm);
        $opcao = Opcao::where('idQuestao',$id);
        $opcao->delete();
        for ($i = 0; $i < count($request['opcao']); $i++) {
            $opcoes[] = new Opcao(
                [
                    'enunciadoOpcao' => $request['opcao'][$i],
                    'corretaOpcao' => $request['opcaoCorreta'][$i]
                ]);
        }
        $questao->opcao()->saveMany($opcoes);

        return redirect()->route('questao.index')->withSuccess("Questão '$questao->idQuestao' atualizado com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questao = $this->questao::find($id);
        $opcao = Opcao::where('idQuestao',$id);
        $opcao->delete();
        $delete = $questao->delete();
        if ($delete)
            return redirect()->route('questao.index')->withSuccess("Questão '$questao->idQuestao' deletada com sucesso.");
        else
            return redirect()->route('questao.index')->withErrors("Falha ao deletar a questão '$questao->idQuestao'");
    }
}
