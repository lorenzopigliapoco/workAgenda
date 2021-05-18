@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Riepilogo ore spese per Utente</h1>
  <p> Compila il form, inserendo  un range temporale nel quale calcolare i costi e le ore spese. </p>

  <form action="{{ URL::action('App\Http\Controllers\UserController@cerca')}}" method="POST">
  {{ csrf_field() }} 

    <div class = "row">
      
      <div class= "col-sm"> 
          <label> Calcola ore spese a partire dal </label>
      </div>
      
      <div class= "col-sm"> 
          <label> a </label>
      </div>

      <div class= "col-sm"> 
          <label>ID Utente</label>
      </div>

    </div>  <!-- Fine prima riga -->
  
      <div class="form-group row">
      
        <div class="col-sm col-form-label text-md-right">
          <input type="date" class="form-control" name="dataInizio" id="dataInizio" value="<?=date("Y-m-01")?>" required>
        </div class>

       
        <div class = "col-sm col-form-label text-md-right">
          <input type="date" class="form-control" name="dataFine" id="dataFine" value="<?=date("Y-m-t")?>" required>
        </div>

        <div class="col-sm">
            <select class="form-control" name="id" id="id" placeholder="id" required>
              <option disabled selected value> -- Scegli un'opzione -- </option>
              @foreach($utenti as $utente)
               <option> <?=$utente->utente_id?>  </option>
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
            <a href="{{ URL::action('App\Http\Controllers\UserController@index') }}" class="btn btn-outline-secondary" style="margin-left:20px">
                        <img src="https://img.icons8.com/flat-round/17/000000/back--v1.png"/>
                        Indietro
            </a>
            <br></br>
          </div>
        </div>

          
          
    </form>
</div>
<div class="container">
  <table class="table table-bordered table-striped sorted regroup">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="text-align:center"><a href="">Data</a></th>
            <th scope="col" style="text-align:center">Utente</th>
            <th scope="col" style="text-align:center">ID - Nome progetto</th>
            <th scope="col" style="text-align:center">Ore spese </th>
            <th scope="col" style="text-align:center">Costo Orario </th>
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
            <td style="text-align:center">{{ $ora->utente }} </td>
            <td style="text-align:center">{{ $ora->id }} - {{ $ora->nome_progetto }}</td>
            <td style="text-align:center">{{ $ora->ore_spese }} h</td>
            <td style="text-align:center">{{ $ora->costoOra }} €</td>
            <?php
            $totaleOre = $totaleOre + ($ora->ore_spese);
            $costoRiga = (($ora->costoOra)*($ora->ore_spese));
            $costoTotale = $costoTotale + $costoRiga; 
            ?>
            <td style="text-align:center"><strong>{{ $costoRiga }}€</strong></td>
          </tr>
          @endforeach
        </tbody>
    </table>
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary text-center">Totale ore : {{$totaleOre}} h&nbsp;&nbsp;&nbsp;
            <?php
              $ruolo=auth()->user()->isAdmin();
              if ($ruolo!=false){ ?>
                Costo Totale : {{$costoTotale}}€</p>
              <?php } else{ ?>
                  </p>
                <?php } ?>
        </div>

</div>

</div>
@endsection