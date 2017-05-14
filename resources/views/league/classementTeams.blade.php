@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">

<form method="get">

 Ligue:

<select name="league">
  <option value="0">Toutes ligues</option>
  @foreach($allLeague as $optLigue)
  	@if($ligue == $optLigue->id)
  	<option value="{{$optLigue->id}}" selected>{{$optLigue->name}}</option>
  	@else
  	<option value="{{$optLigue->id}}">{{$optLigue->name}}</option>
  	@endif
  @endforeach
</select>


Saison:
@if($ligue <> 0)
<select name="season">
  <option value="0">Toutes saisons</option>
  @foreach($season as $optSaison)
  	@if($saison == $optSaison->id)
  	<option value="{{$optSaison->id}}" selected>{{$optSaison->name}}</option>
  	@else
  	<option value="{{$optSaison->id}}">{{$optSaison->name}}</option>
  	@endif
  @endforeach
</select>
@else
<select disabled>
  <option value="0">Toutes saisons</option>
  @foreach($season as $optSaison)
  	<option value="{{$optSaison->id}}">{{$optSaison->name}}</option>
  @endforeach
</select>
@endif

<input type="submit" value="refresh"/>
</form>
        

<table>
<tr>
<th>Equipe</th>
<th>Matchs</th>
<th>Victoires</th>
<th>Defaites</th>
<th>Nulles</th>
<th>Buts Comptes</th>
<th>Buts Recus</th>
</tr>

@foreach($teams as $team)
@php
$matches = App\Match::where('local_team_id',$team->id)->orWhere('visiting_team_id',$team->id)->get();
$buts = 0;
$goals = 0;
@endphp

<tr>
<td><a href="/equipe/{{$team->id}}">{{$team->name}}</a></td>
<td>{{$matches->count()}}</td>
<td>{{ $matches->where('winning_team',$team->name)->Where('final_score_local','<>','final_score_visitor')->count()}}</td>
<td>{{ $matches->where('losing_team',$team->name)->Where('final_score_local','<>','final_score_visitor')->count()}}</td>
<td>{{ $matches->where('final_score_local','final_score_visitor')->count() }}</td>
<td>
@foreach($matches as $match)
	@if($team->id == $match->local_team_id)
		@php
		$buts += $match->final_score_local;
		@endphp
	@else
	@php
		$buts += $match->final_score_visitor;
		@endphp
	@endif
@endforeach
{{ $buts }}
</td>
<td>
@foreach($matches as $match)
	@if($team->id == $match->local_team_id)
		@php
		$goals += $match->final_score_visitor;
		@endphp
	@else
	@php
		$goals += $match->final_score_local;
		@endphp
	@endif
@endforeach
{{ $goals }}
</td>
</tr>

@endforeach

</table>
</div>

@endsection