@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">

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
<td>{{$team->name}}</td>
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