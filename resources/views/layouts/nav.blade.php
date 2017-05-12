    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">



        <ul class="main-navigation">
  <li><a href="#">Home</a></li>
  <li><a href="#">League</a>
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

              <li><a href="/league/{{$league->id}}/players">Joueurs</a></li>
              <li><a href="/league/{{$league->id}}/teams">Equipes</a></li>
            </ul>
            </li>
    @endforeach
    </ul>
  </li>
  <li><a href="#">About Us</a></li>
</ul>


          
        </nav>
      </div>
    </div>
