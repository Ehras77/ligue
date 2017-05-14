@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">

<table>
<tr>
  <td>Location : {{$match->location}}</td>
  <td>Équipe locale : <a href="/equipe/{{$localTeam->first()->id}}">{{$localTeam->first()->name}}</a></td>
  <td>Equipe Visiteur : <a href="/equipe/{{$visitingTeam->first()->id}}">{{$visitingTeam->first()->name}}</a></td>
  <td>Score : {{$match->final_score_local}} - {{$match->final_score_visitor}}</td>
</tr>
<tr>
  <td>
    @if ($match->final_score_local == $match->final_score_visitor)
      Gagnant : Nulle
    @else
      Gagnant : {{$match->winning_team}}
    @endif
  </td>
</tr>
</table>

<table style="display:inline;border-top:2px solid;padding-top:10px;">


<tr>
 <td> Équipe local : <a href="/equipe/{{$localTeam->first()->id}}">{{$localTeam->first()->name}}</a></td>
</tr>
  <tr>
    <th>Joueur</th>
    <th>But</th>
    <th>Passe</th>
    <th>Pen. Mineur</th>
    <th>Pen. Majeur</th>
  </tr>

@foreach($localTeam as $team)
  @foreach($team->player as $joueur)
  <tr>
    <td><a href="/joueur/{{$joueur->id}}">{{$joueur->first_name}} {{$joueur->last_name}}</a></td>
    <td>{{ $stats->where('stat_name', '=','But')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Passe')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Mineur')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Majeure')->where('player_id',$joueur->id)->count() }}</td>
  </tr>
  @endforeach
@endforeach
</table>
<table style="display:inline;border-top:2px solid;padding-top:10px;">
<tr>
  <td>Équipe visiteur : <a href="/equipe/{{$visitingTeam->first()->id}}">{{$visitingTeam->first()->name}}</a></td>
</tr>

<tr>
  <th>Joueur</th>
  <th>But</th>
  <th>Passe</th>
  <th>Pen. Mineur</th>
  <th>Pen. Majeur</th>
</tr>

@foreach($visitingTeam as $team)
  @foreach($team->player as $joueur)
  <tr>
    <td><a href="/joueur/{{$joueur->id}}">{{$joueur->first_name}} {{$joueur->last_name}}</a></td>
    <td>{{ $stats->where('stat_name', '=','But')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Passe')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Mineur')->where('player_id',$joueur->id)->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Majeure')->where('player_id',$joueur->id)->count() }}</td>
  </tr>
  @endforeach
@endforeach

</table>

</div>

@endsection