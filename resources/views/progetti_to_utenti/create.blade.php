@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
    <h1>Assegna un progetto a un utente :</h1>
    
    <div class="row">

        <div class="col-4 ">

            <form action="{{ URL::action('App\Http\Controllers\ProgettiUtentiController@store') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="progetto_id">Seleziona l'id del progetto</label>
                    <select class="form-control" name="progetto_id" id="progetto_id">
                    <option disabled selected value>    -- Sceli un'opzione --     </option> 
                        
                        <?php $progetti = DB::table('progettos')
                                        ->select('id','nome_progetto')
                                        ->orderBy('id','asc')
                                        ->get(); 
                        ?>

                        @foreach( $progetti as $p)
                        <option> <?=$p->id?> </option>
                        @endforeach
                    </select>   
                </div>

                <div class="form-group">
                    <label for="utente_id">Seleziona l'id del utente al quale assegnare il progetto.</label>
                    <select class="form-control" name="utente_id" id="utente_id">
                    <option disabled selected value> -- Sceli un'opzione -- </option> 
                        <?php $utenti= DB::table('users')
                                        ->orderBy('id','asc')
                                        ->get(); 
                        ?>
                        
                        @foreach( $utenti as $u)
                        <option> <?= $u->id ?> </option> 
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-outline-primary" >
                    <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
                    Salva
                </button>

                <a href="{{ URL::action('App\Http\Controllers\ProgettiUtentiController@index') }}" class="btn btn-outline-secondary" >
                    <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
                    Indietro
                </a>
                
            </form>
    </div>

    <div class="col-4">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col" style="text-align:center">ID Progetto</th>
                <th scope="col" style="text-align:center">Nome progetto</th>
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
</div>

    <div class=" col-4">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col" style="text-align:center">ID Utente</th>
                <th scope="col" style="text-align:center">Nome utente</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $utenti as $u )
                <tr>
                    
                    <td style="text-align:center">{{ $u->id}}</td>
                    <td style="text-align:center">{{ $u->nome}} {{ $u->cognome}}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>


@endsection  