@extends('layouts.welcomeL')

@section('content')
<div class="jumbotron" style="background-image: url('AAA.jpg'); background-repeat: no-repeat;  background-attachment: fixed;background-size: 100% 100%;">
    <div class="container" >

      <h1 class="display-3" style="margin-bottom:100px;">Hello in workAgenda !</h1>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    
    
    <p>Il tuo software gestionale che permette la gestione della commessa tenendo anche il tracking dei tempi relativi alla produzione.</p>
    <div class="row">
      <div class="col-sm-4">
        <div class=" card text-white bg-success mb-3 h-70" style="height: 250px;">
          <div class="card-header"> 
            <h2><img src="https://img.icons8.com/officel/30/000000/user-group-man-man.png"/> Utenti </h2> 
          </div>
          <div class="card-body">
            <p> Per iniziare ad usare workAgenda è importante definire la struttura interna della propria azienda.</p>
            @guest
              @if (Route::has('login'))
                  
              @endif

              @else
            <p><a class="btn btn-secondary" href="{{ URL::action('App\Http\Controllers\UserController@index') }}" role="button">Vai a utenti &raquo;</a></p>
            @endguest
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class=" card text-white bg-danger mb-3 h-70" style="height: 250px;">
          <div class="card-header"> 
            <h2><img src="https://img.icons8.com/fluent/30/000000/create.png"/> Progetti</h2> 
          </div>

          <div class="card-body">
            <p>Gestione dei progetti richiesti su commessione da parte dei clienti, con successiva gestione dei ticket.</p>
            @guest
              @if (Route::has('login'))
                  
              @endif

              @else
              <p><a class="btn btn-secondary" href="{{ URL::action('App\Http\Controllers\ProgettoController@index') }}"  role="button">Vai a progetti &raquo;</a></p>
            @endguest
          </div>
        </div>
      </div>

      <div class="col-sm-4">
      <div class=" card text-white bg-primary  mb-3 h-70" style="height: 250px;">
        <div class="card-header"> 
        <h2><img src="https://img.icons8.com/dusk/30/000000/company.png"/> Clienti</h2>
        </div>
        <div class="card-body"> 
          <p>Gestione dei nominativi e dei dati relativi ai clienti.</p>
          @guest
            @if (Route::has('login'))
                
            @endif

            @else
            <p><a class="btn btn-secondary"  href="{{ URL::action('App\Http\Controllers\ClienteController@index') }}" role="button" style="margin-top:20px">Vai a clienti &raquo;</a></p>
        @endguest
        </div>
        </div>
    </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <p>&copy; Lorenzo Pigliapoco 2020-2021</p>
</footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.6/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

      


@endsection
