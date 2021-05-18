@extends('layouts.app')
<?php
use App\Models\User;
?>
@include('inputErrors')
@section('content')

<div class="container">

    <h1>Anagrafica utenti </h1>

    <div class="row">

        <div class="col-sm">
            <p>Gestione dell'anagrafica e delle autorizzazioni delle risorse interne della nostra azienda. </p>
            <p>Visualizza su Report i ticket attivati dai nostri utenti con il relativo tempo speso e costi associati.</p>
        </div>

        <div class="col-xs">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <a href="{{ URL::action('App\Http\Controllers\UserController@totale') }}"  > 
                    <button type="button" class="btn btn-outline-success" style="margin-left: 12px;margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                        </svg>
                                Report
                    </button>
                </a>

                <a href="{{ URL::action('App\Http\Controllers\UserController@create') }}"  >
                    <button type="button" class="btn  btn-outline-primary" style="margin-left: 12px;margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
                        </svg>
                                Aggiungi
                    </button>
                </a>
            </div>

        </div>
    </div>

    <div class="row">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col" style="text-align:center">ID</th>
                <th scope="col"style="text-align:center">Nome</th>
                <th scope="col"style="text-align:center">Cognome </th>
                <th scope="col"style="text-align:center">Email</th>
                <th scope="col"style="text-align:center">Ruolo</th>
                <th scope="col" style="text-align:center">Azioni</th>
                </tr>  
            </thead>
            @foreach( $users as $u)
                <tr>
                    <th scope="row" style="text-align:center">{{ $u->id }} </th>
                    <td style="text-align:center">{{ $u->nome }}</td>
                    <td style="text-align:center">{{ $u->cognome}}</td>
                    <td style="text-align:center">{{ $u->email}}</td>
                    <td style="text-align:center">{{ $u->ruolo}}</td>
                    <td style="text-align:center">
                    <a href="   {{ URL::action('App\Http\Controllers\UserController@edit',$u) }}" class="btn btn-outline-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    <a href=" {{ URL::action('App\Http\Controllers\UserController@destroy',$u->id) }}" class="btn btn-outline-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                    </td> 
                    
                </tr>
            @endforeach
        </table>

    </div>

    <div class="row">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
        <p class="" style="margin-left:10px;">Utenti Attivi: <?=User::count('id')?></p>
    </div>
    
</div>
@endsection