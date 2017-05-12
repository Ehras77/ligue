
<h2>{{ $player->first_name}} {{$player->last_name}}</h2>
<table>


@foreach($matches as $match)


<tr>
<td>{{ $match->id }}</td>
<td>{{ $stats->where('stat_name','but')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','passe')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Mineur')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Majeure')->where('match_id',$match->id)->count() }}</td>
</tr>


@endforeach




</table>