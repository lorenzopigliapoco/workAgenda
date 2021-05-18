<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query =   \DB::table('clientes')
        ->orderBy('ssid','asc');
        

            if($request->has('ssid'))
            {
                $query->where('ssid','=',$request->input('ssid'));
            }
                    
            if($request->has('ragSoc'))
            {
                $query->where('ragSoc','like','%',$request->input('ragSoc'));
            }

        $clienti = $query->get();

        return view('clienti.index', ['clienti'=>$clienti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);

        $validatedData = $request->validate([
            'ragSoc'        =>'required ',
            'nomeRef'       =>'required ',
            'cognomeRef'    =>'required ',
            'emailRef'      =>'required ',
            'ssid'          =>'required | numeric',
            'PIVA'          =>'required | numeric | digits_between:10,12',
            'PEC'           =>'required | email',
            ]);
        
            return view('clienti');
    }

    public function show(Cliente $cliente)
    {
        //
    }


    public function save(ClienteRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        
        $input = $request->all();
        
        Cliente::create($input);
        
       
            return redirect('/cliente');
        }
        
        
        public function update(ClienteRequest $request, $id )
        {   
            abort_unless(auth()->user()->isAdmin(),403);
            $peo = \DB::table('clientes')->where('ssid',$id)->update([
                'ragSoc'    => $request->input('ragSoc'),
                'nomeRef'   => $request->input('nomeRef'),
                'cognomeRef'=> $request->input('cognomeRef'),
                'emailRef'  => $request->input('emailRef'),
                'ssid'      => $request->input('ssid'),
                'PEC'       => $request->input('PEC'),
                'PIVA'      => $request->input('PIVA')

        ]);
    
        return redirect('/cliente');
    }
   
    public function edit( $id)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $cliente = Cliente::find($id);
        return view('clienti.edit',compact('cliente'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $cliente->delete();

        return redirect('/cliente');
    }



    public function addCliente(Request $request)
    {
        abort_unless(auth()->user()->isAdmin(),403);
        $input= request->all();
        Cliente::create($input);
        /*
        $cliente->ragSoc    = $request->ragSoc;
        $cliente->nomeRef   = $request->nomeRef;
        $cliente->cognomeRef= $request->cognomeRef;
        $cliente->emailRef  = $request->emailRef;
        $cliente->ssid      = $request->ssid;
        $cliente->PEC       = $request->PEC;
        $cliente->PIVA      = $request->PIVA;

        $cliente->save();
        */
         
        return response()->json($cliente);
        
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
        
      $clienti = \DB::table('clientes')
          ->distinct('ssid')
          ->select('ssid')
          ->orderBy('ssid','asc')
          ->get();

      $ore = $query->orderBy('tickets.data','desc')->get();

      return view('clienti.ore_spese', ['ore' => $ore,'clienti' => $clienti]);
    }

    public function cerca(Request $request){
        abort_unless(auth()->user()->isAdmin(),403);
        $query= \DB::table('tickets')
        ->join('progettos', 'progettos.id', '=','tickets.progetto')

        ->select('progettos.id', 'progettos.nome_progetto', 'progettos.ssid_cliente', 'progettos.costoOra','tickets.progetto', 'tickets.utente', 'tickets.ore_spese','tickets.data')
        ->where('ssid_cliente', '=', $request->input('ssid_cliente'));
        
        $clienti = \DB::table('progettos')
          ->distinct('ssid_cliente')
          ->select('ssid_cliente')
          ->get();
      $ore = $query->get();

      return view('clienti.ore_spese', ['ore' => $ore,'clienti' => $clienti]);
    }


}
