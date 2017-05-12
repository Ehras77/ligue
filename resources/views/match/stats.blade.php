<table>


<tr>
  Équipe local : {{$localTeam->first()->name}}
</tr>
  <tr>
    <th>Joueur</th>
    <th>But</th>
    <th>Passe</th>
    <th>Pen. Mineur</th>
    <th>Pen. Majeur</th>
  </tr>

@foreach($localTeam->player as $joueur)
  <tr>
    <td>$joueur->get()->name</td>
    <td>{{ $stats->where('stat_name', '=','But')->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Passe')->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Mineur')->count() }}</td>
    <td>{{ $stats->where('stat_name','=','Pen. Majeure')->count() }}</td>
  </tr>
@endforeach

<tr>
  Équipe visiteur : {{$visitingTeam->first()->name}}
</tr>

<tr>
  <th>Joueur</th>
  <th>But</th>
  <th>Passe</th>
  <th>Pen. Mineur</th>
  <th>Pen. Majeur</th>
</tr>

@foreach($visitingTeam->player as $joueur)
<tr>
  <td>$joueur->get()->name</td>
  <td>{{ $stats->where('stat_name', '=','But')->count() }}</td>
  <td>{{ $stats->where('stat_name','=','Passe')->count() }}</td>
  <td>{{ $stats->where('stat_name','=','Pen. Mineur')->count() }}</td>
  <td>{{ $stats->where('stat_name','=','Pen. Majeure')->count() }}</td>
</tr>
@endforeach

</table>
