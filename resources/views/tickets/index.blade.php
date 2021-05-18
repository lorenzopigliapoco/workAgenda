@extends('layouts.app')
<?php
use App\Models\User;
use App\Models\Ticket;
?>

@section('content')

<div class="container">
    <h1>Ticket</h1>

    <div class="row">
        <div class="col-sm">
            <p> Gestisci e inserisci i ticket relativi alla lavorazione per un progetto su commessa.<br></br> Clicca su Aggiungi per creare un nuovo ticket inserendo: data, ore spese, il progetto di riferimento e delle note per i collaboratori del progetto.</p>
        </div>

        <div class="col-xs">
            <a href="{{ URL::action('App\Http\Controllers\TicketController@create') }}" >
                <button type="button" class="btn  btn-outline-primary float-md-right mb-2" style="margin-left: 12px;margin-bottom:12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                        <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                        <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                    </svg>
                    Aggiungi
                </button>
            </a>
        </div>
    </div>
    <div class="row">

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col" style="text-align:center">Data inserimento</th>
                <th scope="col" style="text-align:center">Nome Progetto </th>
                <th scope="col" style="text-align:center">Ore spese</th>
                <th scope="col" style="text-align:center">Utente</th>
                <th scope="col" style="text-align:center">Azioni</th>
            
                </tr>
            </thead>
            <tbody>
            @foreach( $join as $j)
                <tr>
                    <th scope="row" style="text-align:center">{{ date('d/m/Y', strtotime($j->data)) }}</th>
                    <td style="text-align:center">{{ $j->progetto }} - {{ $j->nome_progetto }} </td>
                    <td style="text-align:center">{{ $j->ore_spese }} h</td>
                    <td style="text-align:center">{{ $j->utente }}</td>
                    <td style="text-align:center">
                    
                        <a href="{{ URL::action('App\Http\Controllers\TicketController@destroy', $j->data) }}" class="btn btn-outline-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>

                    </td> 
                    
                </tr>
            @endforeach
        
            </tbody>
        </table>
    </div>

    <div class="row">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
        </svg>
        <p class="" style="margin-left:10px;">Tickets Attivi: <?=Ticket::count('id')?></p>
    </div>


</div>

@endsection