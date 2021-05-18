@extends('layouts.app')
<?php
use App\Models\Progetto;
?>
@include('inputErrors')
@section('content')

<div class="container">
    <h1>Gestione progetti </h1>
    
    <div class="row">

        <div class="col-sm">
            <p>Creazione, modifica e cancellazione di commesse richieste da dei clienti già registrati nel sistema. Report dei ticket relativi a un progetto, richiesti in un determinato range temporale.</p>
            <p>Visualizza su Report i ticket attivati per progetto, con il relativo tempo speso e costi associati.</p>
        </div>
    
        <div class="col-xs">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                <a href="{{ URL::action('App\Http\Controllers\TicketController@totale') }}" > 
                    <button type="button" class="btn btn-outline-success" style="margin-left: 12px;margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                        </svg>
                        Report
                    </button>
                </a>

                <a href="{{ URL::action('App\Http\Controllers\ProgettoController@create') }}" >
                    <button type="button" class="btn  btn-outline-primary" style="margin-left: 12px;margin-bottom:12px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
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

                <th scope="col">ID Progetto</th>
                <th scope="col">Noma progetto</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Note</th>
                <th scope="col">Data Inizio</th>
                <th scope="col">Data Fine</th>
                <th scope="col">ID Cliente</th>
                <th scope="col">Costo orario</th>
                <th scope="col" style="text-align:center">Azioni</th>

                </tr>
            </thead>
            <tbody>
            @foreach($progetti as $p)
                <tr>
                    <th style="text-align:center" scope="row">{{$p->id}}</th>
                    <td>{{ $p->nome_progetto}}</td>
                    <td><small>{{ $p->descrizione}}</small></td>
                    <td><small>{{ $p->note}}</small></td>
                    <td><small>{{ date('d/m/Y',strtotime( $p->dataInizio))}}</small></td>
                    <td><small>{{ date('d/m/Y',strtotime( $p->dataFine))}}</small></td>
                    <td style="text-align:center">{{ $p->ssid_cliente}}</td>
                    <td style="text-align:center">{{ $p->costoOra}} €</td>
                    <td style="width: 120px;text-align:center">
                        <a href="{{ URL::action('App\Http\Controllers\ProgettoController@edit', $p) }}" class="btn btn-outline-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                        <a href="{{ URL::action('App\Http\Controllers\ProgettoController@destroy', $p ) }}" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>

                    </td> 
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
        </svg>
        <p class="" style="margin-left:10px;">Progetti Attivi: <?=Progetto::count('id')?></p>
    </div>

</div>

@endsection