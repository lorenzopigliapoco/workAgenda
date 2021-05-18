@extends('layouts.app')

@section('content')

@include('inputErrors')


<div class="container">
<h1>Modifica un progetto :</h1>
    <form action="{{URL::action('App\Http\Controllers\ProgettoController@update',$progetto) }}" method="POST">
         <input type="hidden" name="_method" value="PATCH">
         {{ csrf_field() }}

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nome">Nome progetto:</label>
                    <input type="text" class="form-control" name="nome_progetto" value="{{ $progetto->nome_progetto }}">
                </div>

                <div class="form-group">
                    <label for="">Data inizio:</label>
                    <input type="date" class="form-control" name="dataInizio" value="{{ $progetto->dataInizio}}">
                </div>
                
                <div class="form-group">
                    <label for="">Data fine:</label>
                    <input type="date" class="form-control" name="dataFine" value="{{ $progetto->dataFine}}">
                </div>
                
            </div>    

            <div class="col">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrizione:</label>
                    <input type="text" class="form-control"  name="descrizione" value="{{ $progetto->descrizione }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Note:</label>
                    <input type="text" class="form-control"  name="note" value="{{ $progetto->note}}">
                </div>

                <div class="form-group">
                    <label for="nome">Costo orario :</label>
                    <input type="number" class="form-control" name="costoOra" value="{{ $progetto->costoOra}}">
                </div>
            </div>

        </div>
            


        

        <a href="{{ URL::action('App\Http\Controllers\UserController@index') }}" class="btn btn-outline-secondary">
            <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
            Indietro
        </a>

        <a href="{{ URL::action('App\Http\Controllers\ProgettoController@destroy', $progetto ) }}" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
            Cancella
        </a>
        
        <button type="submit" class="btn btn-outline-primary ">
            <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
            Salva
        </button>
        
    </form>
  
</div>
@endsection  