@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
<h1>Inserisci un nuovo ticket : </h1>


<div class="row">

    <div class= "col">
        <p> Inserisci la data e le ore spese per la realizzazione di questo ticket che si desidera registrare </p>
        <form action="{{ URL::action('App\Http\Controllers\TicketController@save') }}" method="POST">
         {{ csrf_field() }}
        
            <div class="row" style='margin-top:25px;'>
                <div class="col">
                    <label for="data">Data:</label>
                    <input type="date" class="form-control" name="data" id="data" value="<?=date("Y-m-d")?>">
                </div>

                <div class="col">
                    <label for="">Ore spese :</label>
                    <input type="text" class="form-control" name="ore_spese" id="ore_spese">
                </div>
            </div>

            <div class="row" style='margin-top:25px;'>
                <div class="col">
                        <label for="">Progetto di riferimento:</label>
                        <select class="form-control" name="progetto" id="progetto" >
                            <option  disabled selected value > -- Scegli un'opzione -- </option>
                            
                            <?php $progettiUtente = \DB::table('progetti_to_users')
                                    ->where('utente_id','=', auth()->user()->id )
                                    ->orderBy('utente_id','asc')
                                    ->get(); 
                            ?>
                            
                            @foreach( $progettiUtente as $progetto)
                                <option><?=$progetto->utente_id?></option> 
                            @endforeach  
                        </select>
                </div>
            </div>

            <div class="row" style='margin-top:25px;'>
                <div class="col-8">

                    <div class="form-group">
                        <label for="">Note:</label>
                        <textarea name="note" id="note" class="form-control"></textarea>
                    </div>
                    
                </div>

            </div>
    </div> <!-- Fine prima colonna INPUT -->
   
    <div class= "col">
        <table class="table table-bordered table-striped">
            
            <?php $progetti = DB::table('progettos')
                            ->select('id','nome_progetto')
                            ->orderBy('id','asc')
                            ->get(); 
            ?>
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="text-align:center">ID Progetto </th>
                    <th scope="col" style="text-align:center">Nome Progetto</th>
                </tr>
            </thead>

            <tbody>
                @foreach( $progetti as $p )
                    <tr>
                        
                        <td style="text-align:center">{{ $p->id}}</td>
                        <td style="text-align:center">{{ $p->nome_progetto}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
            
           
        </table>

    </div> <!-- Fine Seconda colonna Visualizzazione -->

</div> <!-- Fine Riga -->
       
        
    <button type="submit" class="btn btn-outline-primary" >
        <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
        Salva
    </button>

    <a href="{{ URL::action('App\Http\Controllers\TicketController@index') }}" class="btn btn-outline-secondary" >
        <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
        Indietro
    </a>

</form>
</div>
@endsection  