@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
<h1>Inserisci un nuovo utente : </h1>
<p> Inserisci l'anagrafica e il ruolo desiderato per il nuovo utente.</p>
    <form action="{{ URL::action('App\Http\Controllers\UserController@store') }}" method="POST">
         {{ csrf_field() }}
        
    <div class= "row">
        <div class="col"> 
            <div class="form-group">
                <label for="">Nome utente :</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        </div>
            
        <div class="col">
            <div class="form-group">
                <label for="">Cognome utente :</label>
                <input type="text" class="form-control" name="cognome" id="cognome">
            </div>
        </div>
    </div>
      
    <div class= "row">
        <div class="col mb-5"> 
            <div class="form-group">
                <label for="">Email utente :</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
        </div>
            
        <div class="col mb-5">
            <div class="form-group">
                <label for="">Password :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
        </div>

        <div class="col mb-2">
            <div class="form-group">
                <label for="">Ruolo:</label>
                <select class="form-control" name="ruolo" id="ruolo">
                    <option>Admin</option>
                    <option>Semplice</option>
                </select>
            </div>  
        </div>

    </div>


        <button type="submit" class="btn btn-outline-primary">
            <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
            Salva
        </button>

        <a href="{{ URL::action('App\Http\Controllers\UserController@index') }}" class="btn btn-outline-secondary">
            <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
            Indietro
        </a>


    </form>
  
</div>



@endsection  