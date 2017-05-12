
<h2>{{ $team->name }}</h2>
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
@endphp

<tr>
<td>Total</td>
<td>{{ $matches->where('winning_team',$team->name)->Where('final_score_local','<>','final_score_visitor')->count()}} Victoires </td>
<td>{{ $matches->where('losing_team',$team->name)->Where('final_score_local','<>','final_score_visitor')->count()}} Défaites </td>
<td>{{ $matches->where('losing_team',$team->name)->Where('final_score_local','final_score_visitor')->count()}} nulles </td>
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
<td>{{ $match->location }}</td>

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