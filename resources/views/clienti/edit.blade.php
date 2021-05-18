@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
<h1>Modifica un progetto: </h1>
    <form action="{{URL::action('App\Http\Controllers\ClienteController@update',$cliente->ssid )}}" method="POST">
         <input type="hidden" name="_method" value="PATCH">
         {{ csrf_field() }}


        <div class="form-group">
            <label for="ragSoc">Ragione sociale:</label>
            <input type="text" class="form-control" name="ragSoc" id="ragSoc" value="{{ $cliente->ragSoc }}">
        </div>
        
        <div class="form-group">
            <label for="nomeRef">Nome :</label>
            <input type="text" class="form-control"  name="nomeRef" id="nomeRef" value="{{ $cliente->nomeRef }}">
        </div>

        <div class="form-group">
            <label for="cognomeRef">Cognome :</label>
            <input type="text" class="form-control"  name="cognomeRef" id="cognomeRef"value="{{ $cliente->cognomeRef}}">
        </div>
       
        <div class="form-group">
            <label for="emailRef">Email :</label>
            <input type="text" class="form-control"  name="emailRef" id="emailRef" value="{{ $cliente->emailRef}}">
        </div>
        
        <div class="form-group">
            <label for="ssid">ssid:</label>
            <input type="text" class="form-control"  name="ssid" id="ssid" value="{{ $cliente->ssid}}">
        </div>
        <div class="form-group">
            <label for="PEC">PEC:</label>
            <input type="text" class="form-control"  name="PEC" id="PEC" value="{{ $cliente->PEC}}">
        </div>
       
        <div class="form-group">
            <label for="PIVA">Partita IVA :</label>
            <input type="text" class="form-control"  name="PIVA" id="PIVA" value="{{ $cliente->PIVA}}">
        </div>

        <button type="submit" class="btn btn-primary">Salva modifica</button>
        <a href="{{ URL::action('App\Http\Controllers\ClienteController@index') }}" class="btn btn-secondary">Indietro</a>
    </form>
  
</div>
@endsection  