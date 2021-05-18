@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
    <h1>Modifica un utente : </h1>

    <form action="{{ URL::action('App\Http\Controllers\UserController@update', $utente) }}" method="POST">
        <input type="hidden" name="_method" value="PATCH">
         {{ csrf_field() }}

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nome">Nome utente :</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $utente->nome }}">
                </div>
                <div class="form-group">
                    <label for="cognome">Cognome utente :</label>
                    <input type="text" class="form-control" name="cognome" id="cognome" value="{{ $utente->cognome }}"> 
                </div>
                <div class="form-group">
                    <label for="email">Email utente :</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $utente->email }}">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="ruolo">Ruolo:</label>
                    <?php $ruolo=$utente->ruolo; ?> 
                    
                    @if($ruolo == "Admin")
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ruolo" id="ruolo" value="Admin" checked>
                        <label class="form-check-label" for="">
                            Admin
                        </label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ruolo" id="ruolo" value="Semplice">
                        <label class="form-check-label" for="">
                            Semplice
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ruolo" id="ruolo" value="Semplice" checked>
                        <label class="form-check-label" for="">
                            Semplice
                        </label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ruolo" id="ruolo" value="Admin">
                        <label class="form-check-label" for="">
                            Admin
                        </label>
                    </div>
                
                    @endif
                </div>

            </div>
        </div>

        <div class="row" style="margin-left:1px">
            <button type="submit" class="btn btn-outline-primary">
                <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
                Salva
            </button>

            <a href="{{ URL::action('App\Http\Controllers\UserController@index') }}" class="btn btn-secondary" style="margin-left:1px">
                <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
                Indietro
            </a>
        </div>
    </form>

        
</div>
@endsection  