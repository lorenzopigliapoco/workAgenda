<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgettoUtenteRequest;

use DB;
use App\Models\ProgettoUtente;
use App\Models\Progetto;
use App\Models\User;

class ProgettiUtentiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = \DB::table('progetti_to_users')
        ->join('progettos','progettos.id','=','progetti_to_users.progetto_id')
        ->join('users','users.id','=','progetti_to_users.utente_id')
        ->select('progettos.id','progettos.nome_progetto','progetti_to_users.progetto_id','progetti_to_users.utente_id','users.nome','users.cognome');

        $progetti_to_users = $query->orderBy('progetti_to_users.utente_id','asc')->get();


        return view('progetti_to_utenti.index',['progetti_to_users' => $progetti_to_users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(),403);
        return view('progetti_to_utenti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgettoUtenteRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $input = $request->all();
        ProgettoUtente::create($input);
        
        return redirect('/progetti_utenti');
    
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
        //
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
        //
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
        $progetto_utente = ProgettoUtente::where('progetto_id',$id)->delete();

        return redirect('/progetti_utenti');
    }
}
