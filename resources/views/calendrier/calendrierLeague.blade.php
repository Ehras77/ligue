@extends ('layouts.master')

@section ('content')


        <div class="col-sm-8 blog-main">

        <table>
        <tr><td>test</td></tr>
        @foreach($matches as $match)
        <tr>
        <td>{{$match->location}}</td>

        </tr>
        @endforeach
        </table>
          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

@endsection