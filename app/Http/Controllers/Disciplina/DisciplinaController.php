<?php

namespace App\Http\Controllers\Disciplina;

use App\Http\Controllers\Controller;

use App\Model\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaFormRequest;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $disciplina;

    public function __construct(Disciplina $disciplina)
    {
        $this->middleware('auth');
        $this->disciplina = $disciplina;
    }

    public function index()
    {
        $disciplinas = $this->disciplina->orderby('nmDisciplina')->paginate(10);
        return view('disciplina.disciplina', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplina.cadastrardisciplina');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplinaFormRequest $request)
    {
        $dataForm = $request->except('_token');

        $insert = $this->disciplina->create($dataForm);
        if ($insert) {
            return redirect()->route('disciplina');
        } else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disciplina = $this->disciplina->find($id);
        return view('disciplina.cadastrardisciplina', compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(DisciplinaFormRequest $request, $id)
    {
        $dataForm = $request->except('_token');
        $disciplina = $this->disciplina->find($id);
        $update = $disciplina->update($dataForm);
        if ($update) {
            return redirect()->route('disciplina.index')->withSuccess("Série '$disciplina->nmDisciplina' alterada com sucesso.");
        } else
            return redirect()->route('disciplina.edit', $id)->withErrors("Falha ao alterar a disciplina.");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disciplina = $this->disciplina->find($id);
        $delete = $disciplina->delete();
        if ($delete)
            return redirect()->route('disciplina.index')->withSuccess("Disciplina '$disciplina->nmDisciplina' deletada com sucesso.");
        else
            return redirect()->route('disciplina.index')->withErrors("Falha ao deletar a disciplina '$disciplina->nmDisciplina'");
    }
}
