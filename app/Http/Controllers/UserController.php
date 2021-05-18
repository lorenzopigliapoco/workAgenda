<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Cliente;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('utenti.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(),403);
        return view('utenti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $input = $request->all();
        User::create($input);
        
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $utente= User::find($id);
        
        return view('utenti.edit',compact('utente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        abort_unless(auth()->user()->isAdmin(),403);
        $peo = \DB::table('users')->where('id',$id)->update([
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'email' => $request->input('email'),
            'ruolo' => $request->input('ruolo')
           
        ]);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $utente = User::find($id);
        $utente->delete();
        return redirect('/user');
    }

    public function totale(Request $request){
        abort_unless(auth()->user()->isAdmin(),403);
        
        $query= \DB::table('tickets')
        ->join('progettos', 'progettos.id', '=','tickets.progetto')
        ->select('progettos.id', 'progettos.nome_progetto', 'progettos.ssid_cliente', 'progettos.costoOra', 'tickets.progetto', 'tickets.utente', 'tickets.ore_spese','tickets.data');
        
        if ($request->has('progetto'))
        {
                $query->where('progetto', '=', $request->input('progetto'));
        }
        
      $utenti = \DB::table('progetti_to_users')
          ->distinct('utente_id')
          ->select('utente_id')
          ->orderBy('utente_id','asc')
          ->get();

      $ore = $query->orderBy('tickets.data','desc')->get();

      return view('utenti.ore_spese' , ['ore' => $ore,'utenti' => $utenti]);
       
    }

    public function cerca(Request $request,$id){
        abort_unless(auth()->user()->isAdmin(),403);
        
        $query= \DB::table('tickets')
        ->join('progettos', 'progettos.id', '=','tickets.progetto')
        ->select('progettos.id', 'progettos.nome_progetto', 'progettos.ssid_cliente', 'progettos.costoOra','tickets.progetto', 'tickets.utente', 'tickets.ore_spese','tickets.data')
        ->where('utente', '=', $request->input('id'));
       
        $utenti = \DB::table('progetti_to_users')
          ->distinct('utente_id')
          ->select('utente_id')
          ->get();
        
        
      $ore = $query->get();
            
      return view('utenti.ore_spese', ['ore' => $ore,'utenti' => $utenti]);
        
   
    }



}
