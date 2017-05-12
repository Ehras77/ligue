@extends ('layouts.master')

@section ('content')


        <div class="col-sm-8 blog-main">
        <h3>Ligue : {{$matches->first()->season->league->name}}</h3>
        <table id="tblCalendrier">
        <tr>
        <th style="padding-right:10px;">Saison</th>
        <th style="padding-right:10px;">Location</th>
        <th style="padding-right:10px;">Date</th>
        <th style="padding-right:10px;">Equipes</th>
        </tr>
        @foreach($matches as $match)

        <tr>
        <td style="padding-right:10px;">{{$match->season->name}}</td>
        <td style="padding-right:10px;">{{$match->location}}</td>
        <td style="padding-right:10px;">{{$match->date}}</td>
        <td style="padding-right:10px;">{{App\Team::find($match->local_team_id)->name}} VS {{App\Team::find($match->visiting_team_id)->name}}</td>

        </tr>
        @endforeach
        </table>

        </div><!-- /.blog-main -->

@endsection