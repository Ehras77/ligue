@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">


<table>

<tr>
<th style="padding-right:15px;">Joueur</th>
<th style="padding-right:15px;">Equipe</th>
<th style="padding-right:15px;">Buts</th>
<th style="padding-right:15px;">Passes</th>
<th style="padding-right:15px;">Pen. Mineur</th>
<th style="padding-right:15px;">Pen. Majeure</th>
</tr>

@php
$test =0;
@endphp

@foreach($teams as $team)

	@foreach($team->player as $joueur)		
		<tr>
		<td style="padding-right:15px;">{{ $joueur->last_name }} {{$joueur->first_name}}</td>
		<td style="padding-right:15px;">{{ $team->name }}</td>
		<td style="padding-right:15px;">{{ App\Stats::where('player_id',$joueur->id)->where('stat_name','but')->get()->count() }}</td>
		<td style="padding-right:15px;">{{ App\Stats::where('player_id',$joueur->id)->where('stat_name','passe')->get()->count() }}</td>
		<td style="padding-right:15px;">{{ App\Stats::where('player_id',$joueur->id)->where('stat_name','Pen. Mineur')->get()->count() }}</td>
		<td style="padding-right:15px;">{{ App\Stats::where('player_id',$joueur->id)->where('stat_name','Pen. Majeure')->get()->count() }}</td>
		</tr>
	@endforeach



@endforeach


</table>

</div>

@endsection
