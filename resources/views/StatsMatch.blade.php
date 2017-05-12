@extends ('layouts.master')

@section ('content')
  <div id="equipes">

    <div style="text-align:center" class="col-md-4">
      <h1>Équipe Locale</h1>
      dd($match);
      {{$match->}}
    </div>

    <div style="text-align:center" class="col-md-4">
      <h1>VS</h1>
    </div>

    <div style="text-align:center" class="col-md-4">
      <h1>Équipe Visiteur</h1>
    </div>

  </div>
@endsection
