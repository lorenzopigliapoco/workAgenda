@extends('layouts.all')
<h1>403 NON AUTORIZZATO </h1>

@section('content')
<br>
<div class="text-center">
  <div class="error mx-auto" data-text="403">403</div>
  <p class="text-gray-500 mb-0">Problema tecnico , o </p>
  <p class="lead text-gray-800 mb-5"><b>NON SEI AUTORIZZATO</b></p>
  <div class="col-auto neon">
    <i style="color:red" class="fas fa-exclamation-triangle fa-5x"></i>
  </div>
  <br><br>
  <a href="/">&larr; Torna all'Homepage</a>
</div>

@stop
