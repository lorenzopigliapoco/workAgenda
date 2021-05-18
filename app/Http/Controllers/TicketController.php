<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;


use App\Models\Ticket;
use App\Models\ProgettoUtente;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(auth()->user()->isAdmin()){
            $query =   \DB::table('tickets')
              ->join('progettos', 'progettos.id', '=','tickets.progetto')
              ->select('progettos.id', 'progettos.nome_progetto','progettos.costoOra','tickets.progetto', 'tickets.utente', 'tickets.data', 'tickets.ore_spese');
            
              if ($request->has('progetto')){
              $query->where('progetto', '=', $request->input('progetto'));
            }
            
            if ($request->has('utente')){
              $query->where('utente', '=', $request->input('utente'));
            }
            
          }
          else{
            $query= \DB::table('tickets')
            ->join('progettos', 'progettos.id', '=','tickets.progetto')
            ->select('progettos.id', 'progettos.nome_progetto', 'progettos.costoOra', 'tickets.id','tickets.progetto', 'tickets.utente', 'tickets.data', 'tickets.ore_spese');

            
            if ($request->has('progetto')){
              $query->where('progetto', '=', $request->input('progetto'));
            }
            if ($request->has('utente')){
              $query->where('utente', '=', $request->input('utente'));
            }
          }
      
          $join = $query->orderBy('tickets.data', 'desc')->get();
          return view('tickets.index', ['join' => $join]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progetti= \DB::table('progetti_to_users')
        ->distinct('progetto_id')
        ->select('progetto_id')
        ->where('utente_id','=', auth()->user()->id)
        ->get();
        
        return view('tickets.create',['progetti' => $progetti]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */     
    
    public function save(TicketRequest $request){
        $res = Ticket::create([
          'id' => $request->input('id'),
          'data' => $request->input('data'),
          'progetto' => $request->input('progetto'),
          'ore_spese' => $request->input('ore_spese'),
          'note' => $request->input('note'),
          'utente' => auth()->user()->id,
        ]);  
    
        $progetti = \DB::table('progetti_to_users')
        ->distinct('progetto_id')
        ->select('progetto_id')
        ->where('utente_id', '=', auth()->user()->id)
        ->get();
    
        return redirect('/ticket',['progetti'=>$progetti]);
      }

    public function totale(Request $request){

          $query= \DB::table('tickets')
          ->join('progettos', 'progettos.id', '=','tickets.progetto')
          
          ->select('progettos.id', 'progettos.nome_progetto', 'progettos.costoOra', 'tickets.progetto', 'tickets.utente', 'tickets.ore_spese','tickets.data');
          
          if ($request->has('progetto'))
          {
            $query->where('progetto', '=', $request->input('progetto'));
          }
          $progetti = \DB::table('progetti_to_users')
            ->distinct('progetto_id')
            ->select('progetto_id')
            ->get();
          
            
            $ore = $query->orderBy('tickets.data','desc')->get();
        return view('tickets.ore_spese', ['ore' => $ore,'progetti' => $progetti]);
      }
    
    public function data(Request $request)
    {
        if(auth()->user()->isAdmin()){
            $query = \DB::table('tickets')
            ->join('progettos','progettos.id','=','tickets.progetto')
            ->select('progettos.id','progettos.nome_progetto','progettos.costoOra','tickets.progetto','tickets.id','tickets.utente','tickets.ore_spese','tickets.data')
            ->whereBetween('data',[$request->input('dataInizio'), $request->input('dataFine')])
            ->where('progetto','=', $request->input('progetto'));

            $progetti = \DB::table('progetti_to_users')
            ->distinct('progetto_id')
            ->select('progetto_id')
            ->get();
        }else{
            
            $query = \DB::table('tickets')
            ->join('progettos','progettos.id','=','tickets.progetto')
            ->select('progettos.id','progettos.nome_progetto','progettos.costoOra','tickets.progetto','tickets.id','tickets.utente','tickets.ore_spese','tickets.data')
            ->whereBetween('data',[$request->input('dataInizio'), $request->input('dateFine')])
            ->where('progetto','=', $request->input('progetto'))
            ->where('utente','=', $reqeuste->user()->id);


            $progetti = \DB::table('progetti_to_users')
            ->distinct('progetto_id')
            ->select('progetto_id')
            ->where('utente_id', '=', auth()->user()->id )
            ->get();
        }

        $data = $query->get();
        return view('tickets.data',compact('data','progetti'));
    }

    public function destroy($data)
    {
        $ticket = Ticket::where('data',$data)->delete();

        return redirect('/ticket');
    }
}
