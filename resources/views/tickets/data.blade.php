@extends('layouts.app')

@section('content')

@include('inputErrors')

<div class="container">
    
    <h1>Riepilogo ore per Progetti</h1>
    <p> Compila il form, inserendo un progetto e un range temporale nel quale calcolare i costi e le ore spese. </p>

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
                <option> {{ $progetto->progetto_id }}  </option>
              @endforeach
          </select>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-12">
            <button type="submit" class="btn btn-primary">Cerca</button>
        </div>
    </div>
  </form>


  <table class="table">
        <thead class="thead-dark">
            <tr>
              <th scope="col">Data Inserimento</th>
              <th scope="col">ID Progetto</th>
              <th scope="col">Nome</th>
              <th scope="col">Ore Spese</th>
              <th scope="col">ID Utente</th>
              <?php
                $ruolo=auth()->user()->isAdmin();
                if ($ruolo!=false){ ?>
                  <th scope="col">Costo</th>
              <?php } ?>
            </tr>  
        </thead>
    
    <tbody>
    <?php $totale = 0; $costo = 0;?>
    @foreach ($data as $datas)
      <tr>
        <th>{{date('d/m/Y', strtotime($datas->data))}}</th>
        <td>{{$datas->progetto}}</td>
        <td>{{$datas->nome_progetto}}</td>
        <td>{{$datas->ore_spese}}</td>
        <td><a >{{$datas->utente}}</a></td>
        <?php
          $ruolo=auth()->user()->isAdmin();
          if ($ruolo!=false){ ?>
            <td>{{($datas->costoOra)*($datas->ore_spese)}}€</td>
          <?php } ?>
        <?php
        $totale = $totale + ($datas->ore_spese);
        $costo = $costo+(($datas->costoOra)*($datas->ore_spese));
        ?>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
<div class="card-header py-3">
  <p class="m-0 font-weight-bold text-primary text-center">Totale ore : {{$totale}} &nbsp;&nbsp;&nbsp;
    <?php
      $ruolo=auth()->user()->isAdmin();
      if ($ruolo!=false){ ?>
        Costo Totale : {{$costo}}€</p>
      <?php } else{ ?>
          </p>
        <?php } ?>
</div>
</div>
@endsection
