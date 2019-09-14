<?php

namespace App\Http\Controllers\Serie;

use App\Http\Requests\SerieFormRequest;
use App\Model\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $serie;

    public function __construct(Serie $serie)
    {
        $this->middleware('auth');
        $this->serie = $serie;
    }

    public function index()
    {
        $series = $this->serie->orderBy('nmSerie')->paginate(10);
        return view('serie.serie', compact('series'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serie.cadastrarserie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerieFormRequest $request)
    {
        $dataForm = $request->except('_token');

        $insert = $this->serie->create($dataForm);
        if ($insert) {
            return redirect()->route('serie');
        } else
            return redirect()->back();
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit($idSerie)
    {
        $serie = $this->serie->find($idSerie);

        return view('serie.cadastrarserie', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SerieFormRequest $request, $id)
    {
        $dataForm = $request->except('_token');
        $serie = $this->serie->find($id);
        $update = $serie->update($dataForm);
        if ($update) {
            return redirect()->route('serie.index')->withSuccess("Série '$serie->nmSerie' alterada com sucesso.");
        } else
            return redirect()->route('serie.edit', $id)->withErrors("Falha ao alterar a série.");
    }

    public function destroy($id)
    {
        $serie = $this->serie->find($id);
        $delete = $serie->delete();
        if ($delete)
            return redirect()->route('serie.index')->withSuccess("Série '$serie->nmSerie' deletada com sucesso.");
        else
            return redirect()->route('serie.index')->withErrors("Falha ao deletar a série '$serie->nmSerie'");
    }
}
