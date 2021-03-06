@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">

<h2>{{ $team->name }}</h2>
<form method="GET" action='/edit/team/{{$team->id}}'>
  {{ csrf_field() }}
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Modifier l'équipe</button>
  </div>

</form>
<h2>Season: {{$season->name}}</h2>
<table>

<tr>
<th>Location</th>
<th>Résultat</th>
<th></th>
<th></th>
<th>Buts comptés</th>
<th>Buts reçus</th>

</tr>

@php
$buts = 0;
$goals = 0;
$victoires = 0;
$defaites = 0;
$nulles = 0;
@endphp

@foreach($matches as $match)
@if ($match->final_score_local == $match->final_score_visitor)
@php
	$nulles += 1;
@endphp

@elseif ($match->winning_team == $team->name)

@php
	$victoires += 1;
@endphp

@else

@php
	$defaites +=1;
@endphp
@endif
@endforeach

<tr>
<td>Total</td>


<td>{{ $victoires}} Victoires </td>
<td> {{ $defaites}} Défaites </td>
<td> {{ $nulles }} nulles </td>
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


@foreach($matches as $match)


<tr>
<td><a href="/match/{{$match->id}}">{{ $match->location }}</a></td>

@if ($match->final_score_local == $match->final_score_visitor)

<td>Nulle</td>

@elseif ($match->winning_team == $team->name)

<td>Victoire</td>

@else
<td>Défaite</td>
@endif
<td></td>
<td></td>

@if($team->id == $match->local_team_id)
	<td>{{$match->final_score_local}}</td>
	@else
	<td>{{$match->final_score_visitor}}</td>
@endif

@if($team->id == $match->local_team_id)
	<td>{{$match->final_score_visitor}}</td>
	@else
	<td>{{$match->final_score_local}}</td>
@endif

</tr>


@endforeach




</table>
</div>

@endsection
