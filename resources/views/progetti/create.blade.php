@extends('layouts.app')

@section('content')
<? 
use App\Models\Progetto;
?>

@include('inputErrors')
 
<div class="container">

    <h1>Inserisci un nuovo progetto: </h1>
    <div class="row">
        <div class="col-8">
            <p> Inserisci nome del progetto, la durata , costo orario per il progetto, SSID del cliente che richiede il progetto ed infine le note e la descrizione.</p>
            <form action="{{ URL::action('App\Http\Controllers\ProgettoController@save') }}" method="POST">
                {{ csrf_field() }}
            

                <div class="row" style='margin-top:25px;'>
            
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" /> 
                    <div class="col">
                        <label for="">Nome progetto:</label>
                        <input type="text" class="form-control" name="nome_progetto" id="nome_progetto">
                    </div>
            
                    <div class="col">
                        <label for="">Data inizio:</label>
                        <input type="date" class="form-control" name="dataInizio" id="dataInizio">
                    </div>
                    
                    <div class="col">
                        <label for="">Data fine:</label>
                        <input type="date" class="form-control" name="dataFine" id="dataFine">
                    </div>

                </div>

                <div class="row" style='margin-top:25px;'>
                    <div class="col">
                        <label for="">Costo orario :</label>
                        <input type="number" class="form-control" name="costoOra" id="costoOra" placeholder="€">
                    </div>
            
                    <div class="col">
                        <label for="ssid_cliente">Cliente richiede progetto:</label>
                        <select class="form-control" id="ssid_cliente" name="ssid_cliente">
                        <option disabled selected value>    -- Sceli un'opzione --     </option> 
                            <?php $clienti = DB::table('clientes')
                                            ->orderBy('ssid','asc')
                                            ->get(); 
                            ?>

                            @foreach( $clienti as $c)
                                <option> <?=$c->ssid?>  </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row" style='margin-top:25px;'>
                    <div class="col">
                        <label for="">Descrizione:</label> 
                        <input type="text" class="form-control" name="descrizione" id="descrizione" >
                    </div>
                    
                    <div class="col">
                        <label for="">Note:</label>
                        <input type="text" class="form-control" name="note" id="note">
                    </div>
                </div>  

                <div class="row" style='margin-top:25px'>
                    <button type="submit" class="btn btn-outline-primary" style="margin-left:15px">
                        <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
                        Salva
                    </button>

                    <a href="{{ URL::action('App\Http\Controllers\ProgettoController@index') }}" class="btn btn-outline-secondary" style="margin-left:20px">
                        <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
                        Indietro
                    </a>
                                
                    
                </div>

            </form>
        </div>

        <div class="col">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">SSID Cliente</th>
                        <th scope="col">Ragione Sociale</th>
                    </tr>
                </thead>

                <tbody>
                @foreach( $clienti as $c)
                    <tr>
                        <th style="text-align:center" scope="row">{{ $c->ssid }}</th>
                        <td>{{ $c->ragSoc}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
  </div>
</div>
@endsection  