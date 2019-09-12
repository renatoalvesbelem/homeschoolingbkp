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
        $this->serie = $serie;
    }

    public function index()
    {   $series = $this->serie->paginate(10);
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
