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
<th style="padding-right:15px;">Joueur</th>
<th style="padding-right:15px;">Equipe</th>
<th style="padding-right:15px;">Buts</th>
<th style="padding-right:15px;">Passes</th>
<th style="padding-right:15px;">Pen. Mineur</th>
<th style="padding-right:15px;">Pen. Majeure</th>
</tr>


@foreach($teams as $team)

	@foreach($team->player as $joueur)		
		<tr>
		<td style="padding-right:15px;"><a href="/joueur/{{$joueur->id}}">{{ $joueur->last_name }} {{$joueur->first_name}}</a></td>
		<td style="padding-right:15px;"><a href="/equipe/{{$team->id}}">{{ $team->name }}</a></td>
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
