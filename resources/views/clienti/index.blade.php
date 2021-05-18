@extends('layouts.app')
<?php
use App\Models\Cliente;
?>
@section('content')
@include('inputErrors')


<div class="container">
<h1>Anagrafica clienti </h1>
<div class="row">
    
    <div class="col-sm">
        <p class=""> Gestione della anagrafica del cliente, con la possibilità di modifica ed eliminazione. La creazione di un nuovo cliente avviene tramite una chiamata AJAX. </p>
        <p>Visualizza su Report i ticket attivati per cliente, con il relativo tempo speso e costi associati.</p>
    </div>
    <div class="col-xs">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

            <a href="{{ URL::action('App\Http\Controllers\ClienteController@totale') }}" >
                <button type="button" class="btn btn-outline-success" style="margin-left:10px;margin-bottom:12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                        <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                    </svg>
                    Report
                </button>
            </a>

                <button type="button" class="btn  btn-outline-primary" style="margin-left: 12px;margin-bottom:12px;" data-toggle="modal" data-target="#clienteModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"></path>
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"></path>
                    </svg>
                    Aggiungi
                </button>
        </div>
    </div>
    
</div>

<!-- Modal -->
<div class="row">

    <div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="clienteModal">Inserisci un nuovo cliente:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            <form  id="clienteForm" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl">
                    <div class="form-group">
                        <label for="">Ragione sociale :</label>
                        <input type="text" class="form-control" name="ragSoc" id="ragSoc">
                    </div>
                </div>

                <div class="col-xs">
                    <div class="form-group">
                        <label for="">ssid :</label>
                        <input type="text" class="form-control" name="ssid" id="ssid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Nome  :</label>
                        <input type="text" class="form-control" name="nomeRef" id="nomeRef">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Cognome  :</label>
                        <input type="text" class="form-control" name="cognomeRef" id="cognomeRef">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email  :</label>
                <input type="email" class="form-control" name="emailRef" id="emailRef">
            </div>
            <div class="form-group">
                <label for="">PEC :</label>
                <input type="text" class="form-control" name="PEC" id="PEC">
            </div>
            <div class="form-group">
                <label for="">PIVA :</label>
                <input type="text" class="form-control" name="PIVA" id="PIVA">
            </div>
        
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" href="{{ URL::action('App\Http\Controllers\ClienteController@index') }}">
                <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
                Indietro
            </button>
            
            <button type="submit" class="btn btn-outline-primary">
                <img src="https://img.icons8.com/wired/17/000000/save-close.png"/>
                Salva
            </button>

          
        </div>
        </form>
        </div>
    </div>
    </div>


    <table class="table table-bordered table-striped" id="clienteTable"> 
        <thead class="thead-dark">
            <tr>
            <th scope="col" style="text-align:center">SSID</th>
            <th scope="col" style="text-align:center">Ragione sociale</th>
            <th scope="col" style="text-align:center">Nome </th>
            <th scope="col" style="text-align:center">Cognome </th>
            <th scope="col" style="text-align:center">Email </th>
            <th scope="col" style="text-align:center">PEC</th>
            <th scope="col" style="text-align:center">PIVA</th>
            <th scope="col" style="text-align:center">Azioni</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $clienti as $c)
            <tr>
                <th scope="row" style="text-align:center">{{ $c->ssid }}</th>
                <td style="text-align:center">{{ $c->ragSoc }}</td>
                <td style="text-align:center">{{ $c->nomeRef }}</td>
                <td style="text-align:center">{{ $c->cognomeRef }}</td>
                <td style="text-align:center">{{ $c->emailRef }}</td>
                <td style="text-align:center">{{ $c->PEC }}</td>
                <td style="text-align:center">{{ $c->PIVA }}</td>
                <td style="text-align:center"> 
                <a href="{{ URL::action('App\Http\Controllers\ClienteController@edit', $c->ssid ) }}" class="btn btn-outline-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
                <a href="{{ URL::action('App\Http\Controllers\ClienteController@destroy', $c->ssid)  }}" class="btn btn-outline-danger btn-sm">
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                </svg>
                <p class="" style="margin-left:10px;">Clienti Attivi: <?=Cliente::count('ssid')?></p>
    </div>

</div>
 


        <script type="text/javascript">
        
            $("#clienteForm").submit(function(e){
                e.preventDefault();

                let ragSoc = $("#ragSoc").val();
                let nomeRef = $("#nomeRef").val();
                let cognomeRef = $("#cognomeRef").val();
                let emailRef = $("#emailRef").val();
                let ssid = $("#ssid").val();
                let PEC = $("#PEC").val();
                let PIVA = $("#PIVA").val();
                let _token = $("#input[name=_token]").val();

                $.ajax({
                    url:"{{ URL::action('App\Http\Controllers\ClienteController@addCliente') }}" ,
                    type:"POST",
                    data:{
                        ragSoc: ragSoc,
                        nomeRef: nomeRef,
                        cognomeRef: cognomeRef,
                        emailRef: emailRef,
                        ssid: ssid,
                        PEC: PEC,
                        PIVA: PIVA,
                        _token:_token
                    },

                    success:function(response)
                    {
                        if(response)
                        {
                           
                                    $("#clienteTable tbody").prepend('<tr><td>'+ response.ragSoc+
                                                                    '/td><td>' +  response.nomeRef + 
                                                                    '/td><td>' +  response.cognomeRef +
                                                                    ' /td><td>'+  response.emailRef + 
                                                                    ' /td><td>'+  response.ssid + 
                                                                    ' /td><td>'+  response.PEC + 
                                                                    ' /td><td>'+  response.PIVA + 
                                                                    ' /td></tr>');

                                    $("#clienteForm")[0].reset();
                                    $("#clienteModal").modal('hide');
                        
                        }
                    })
                })
            });
        </script>


   
@endsection