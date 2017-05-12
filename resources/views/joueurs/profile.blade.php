@extends ('layouts.master')

@section ('content')
        <div class="col-sm-8 blog-main">

<h2>{{ $player->first_name}} {{$player->last_name}}</h2>
<table>

<tr>
<th>Location</th>
<th>Buts</th>
<th>Passes</th>
<th>Pen. Mineur</th>
<th>Pen. Majeure</th>
</tr>

<tr>
<td>Total</td>
<td>{{ $stats->where('stat_name','But')->count() }}</td>
<td>{{ $stats->where('stat_name','Passe')->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Mineur')->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Majeure')->count() }}</td>
</tr>


@foreach($matches as $match)


<tr>
<td>{{ $match->location }}</td>
<td>{{ $stats->where('stat_name','But')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','Passe')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Mineur')->where('match_id',$match->id)->count() }}</td>
<td>{{ $stats->where('stat_name','Pen. Majeure')->where('match_id',$match->id)->count() }}</td>
</tr>


@endforeach




</table>
</div>

@endsection