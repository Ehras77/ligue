@extends ('layouts.master')

@section ('content')

        <form method="get">

         Equipes:

        <select name="team">
          <option value="0">Toutes Equipes</option>
          @foreach($teams as $team)
                @if($equipe == $team->id)
                <option value="{{$team->id}}" selected>{{$team->name}}</option>
                @else
                <option value="{{$team->id}}">{{$team->name}}</option>
                @endif
          @endforeach
        </select>


        <input type="submit" value="refresh"/>
        </form>


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
        @php
        $localTeam = App\Team::find($match->local_team_id);
        $visitorTeam = App\Team::find($match->visiting_team_id);
        @endphp
        <td style="padding-right:10px;"><a href="/equipe/{{$localTeam->id}}">{{$localTeam->name}}</a> VS <a href="/equipe/{{$visitorTeam->id}}">{{$visitorTeam->name}}</a></td>

        </tr>
        @endforeach
        </table>

        </div><!-- /.blog-main -->

@endsection