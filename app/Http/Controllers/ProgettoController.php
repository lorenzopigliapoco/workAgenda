<?php

namespace App\Http\Controllers;
use App\Models\Progetto;
use App\Models\ProgettoUtente;
use App\Models\Ticket;
use App\Models\Cliente;

use Illuminate\Http\Request;
use App\Http\Requests\ProgettoRequest;
use DB;

class ProgettoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progetti = Progetto::all();

        return view('progetti.index',compact('progetti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        abort_unless(auth()->user()->isAdmin(),403);

        return view('progetti.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(ProgettoRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $input = $request->all();
        Progetto::create($input);
        
        return redirect('/progetto');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progetto  $progetto
     * @return \Illuminate\Http\Response
     */
    public function show(Progetto $progetto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progetto  $progetto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $progetto = Progetto::find($id);
        return view('progetti.edit',compact('progetto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progetto  $progetto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progetto $progetto)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $input = $request->all();

        $progetto->nome_progetto = $input['nome_progetto'];
        $progetto->descrizione = $input['descrizione'];
        $progetto->note = $input['note'];
        $progetto->dataInizio = $input['dataInizio'];
        $progetto->dataFine = $input['dataFine'];


        $progetto->save();

        return redirect('/progetto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progetto  $progetto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progetto $progetto)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $progetto->delete();
        return redirect('/progetto');
    }
}
