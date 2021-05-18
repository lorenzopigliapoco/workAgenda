@extends('layouts.app')

@section('content')

<div class="container">
    
    <h1>Report per Progetti</h1>
    <p> Compila il form, inserendo un progetto e un range temporale nel quale calcolare i costi e le ore spese per la realizzazione della commessa. </p>

    <form action="{{ URL::action('App\Http\Controllers\TicketController@data') }}" method="POST">
    {{ csrf_field() }} 

    <div class = "row">
      <div class= "col-sm"> 
          <label> Calcola ore spese a partire dal </label>
      </div>
      <div class= "col-sm"> 
          <label> a </label>
      </div>
      <div class= "col-sm"> 
          <label> ID progetto </label>
      </div>
    </div>
  
    <div class="form-group row">
        <div class="col-sm col-form-label text-md-right">
            <input type="date" class="form-control" name="dataInizio" id="dataInizio" value="<?=date("Y-m-01")?>" required>
        </div class>

       
        <div class = "col-sm col-form-label text-md-right">
            <input type="date" class="form-control" name="dataFine" id="dataFine" value="<?=date("Y-m-t")?>" required>
        </div>

        <div class="col-sm">
          <select class="form-control" name="progetto" id="progetto"  required>
              <option disabled selected value> -- Scegli un'opzione -- </option>
              @foreach( $progetti as $progetto )
                <option> {{ $progetto->progetto_id }} </option>
              @endforeach
          </select>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-12">
            <button type="submit" class="btn btn-outline-primary">
              <img src="https://img.icons8.com/cotton/17/000000/search--v2.png"/>
              Cerca
            </button>
            <a href="{{ URL::action('App\Http\Controllers\ClienteController@index') }}" class="btn btn-outline-secondary" style="margin-left:20px">
              <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
              Indietro
            </a>
            <br></br> 
        </div>
    </div>
  </form>


<table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
              <th scope="col" style="text-align:center">Data Inserimento</th>
              <th scope="col" style="text-align:center">ID Progetto</th>
              <th scope="col" style="text-align:center">Nome progetto</th>
              <th scope="col" style="text-align:center">ID Utente</th>
              <th scope="col" style="text-align:center">Ore Spese</th>
              <th scope="col" style="text-align:center">Costo orario</th>
              <?php
                $ruolo=auth()->user()->isAdmin();
                if ($ruolo!=false){ ?>
                  <th scope="col" style="text-align:center">Costo</th>
              <?php } ?>
            </tr>  
        </thead>

        <tbody>
          <?php $totaleOre=0; $costoRiga=0 ; $costoTotale =0?>
        @foreach( $ore as $ora )
          <tr>
            <th style="text-align:center">{{date('d/m/Y', strtotime($ora->data))}}</th>
            <td style="text-align:center">{{$ora->progetto}}</td>
            <td style="text-align:center">{{$ora->nome_progetto}}</td>
            <td style="text-align:center"> {{$ora->utente}}</a></td>
            <td style="text-align:center">{{$ora->ore_spese}} h</td>
            <td style="text-align:center">{{$ora->costoOra}} €</td>
              <?php
                $ruolo=auth()->user()->isAdmin();
                if ($ruolo!=false){ ?>
                    <td style="text-align:center"><strong>{{($ora->costoOra)*($ora->ore_spese)}} €</strong></td>
              <?php } ?>

              <?php
            
              $totaleOre = $totaleOre + ($ora->ore_spese);
              $costoRiga = (($ora->costoOra)*($ora->ore_spese));
              $costoTotale = $costoTotale + $costoRiga; 
              ?>
          </tr>
          @endforeach
        </tbody>
    </table>
        <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary text-center">Totale ore : {{$totaleOre}} h &nbsp;&nbsp;&nbsp;
            <?php
              $ruolo=auth()->user()->isAdmin();
              if ($ruolo!=false){ ?>
                Costo Totale : {{ $costoTotale }} €</p>
              <?php } else{ ?>
                  </p>
                <?php } ?>
        </div>
</div>
@endsection
