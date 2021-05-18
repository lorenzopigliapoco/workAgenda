 @extends('layouts.app')

@section('content')

<div class="container">
    <h1>Assegnazione dei progetti  </h1>
    
    <div class="row">
        <div class="col-sm">
            <p> Clicca su aggiungi per effettuare un assegnamento di un progetto richiesto ad uno degli utenti.</p>
        </div>

        <div class="col-xs">
            <a href="{{ URL::action('App\Http\Controllers\ProgettiUtentiController@create') }}" >
                <button type="button" class="btn  btn-outline-primary float-md-right mb-2" style="margin-left: 12px;margin-bottom:12px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                        <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                        <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
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
                <th scope="col" style="text-align:center">ID Utente</th>
                <th scope="col" style="text-align:center">Nome utente</th>
                <th scope="col" style="text-align:center">ID Progetto</th>
                <th scope="col" style="text-align:center">Noma progetto</th>
                <th scope="col" style="text-align:center">Azioni</th>
            </tr>
        </thead>

        <tbody>
        @foreach( $progetti_to_users as $pu )
            <tr>
                <td style="text-align:center"> 
                {{ $pu->utente_id}} </td>
                <td style="text-align:center">{{ $pu->nome}} {{ $pu->cognome}}</td>
                <td style="text-align:center">{{ $pu->progetto_id }}</td>
                <td style="text-align:center">{{ $pu->nome_progetto}}</td>
                <td style="text-align:center">
                    <a href="{{ URL::action('App\Http\Controllers\ProgettiUtentiController@destroy', $pu->id) }}" class="btn btn-outline-danger btn-sm">
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

</div>
<script type="text/javascript">
      $('#idTabella').DataTable({
          "order": [[2, 'asc'], [3, 'asc']],
          "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
          }
      });
      </script>
@endsection