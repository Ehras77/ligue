    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">



        <ul class="main-navigation">
  <li><a href="/">Home</a></li>
  <li><a href="#">Calendrier</a>
    <ul>
      @foreach(\App\League::get() as $league)

                <li style="z-index:100000;"><a href="#">{{$league->name}}</a>
                <ul>
                @foreach($league->season as $season)
                  <li><a href="/calendrier/{{$season->id}}">{{$season->name}}</a></li>
                @endforeach
                </ul>
                </li>
     @endforeach
    </ul>
  </li>
  <li><a href="#">Classement</a>
    <ul>
    @foreach(\App\League::get() as $league)
            <li style="z-index:100000;"><a href="#">{{$league->name}}</a>
            <ul>

              <li><a href="/league/players?league={{$league->id}}">Joueurs</a></li>
              <li><a href="/league/teams?league={{$league->id}}">Equipes</a></li>
            </ul>
            </li>
    @endforeach
    </ul>
  </li>
  @if (Auth::guest())
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
  @else
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu" role="menu">
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
          </ul>
      </li>
  @endif
</ul>
  </nav>
</div>
</div>
