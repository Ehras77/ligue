    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="/">Home</a>
          
      <!--  <div class="dropdown">
           <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
           <span class="caret"></span></button>
           <ul class="dropdown-menu">
              @foreach(\App\League::get() as $league)

                <li>

                 <div class="dropdown">
                  <button class="dropbtn">{{$league->name}}</button>
                  <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                  </div>
                </div>

                </li>
              @endforeach
            </ul>
        </div>-->




        <ul class="main-navigation">
  <li><a href="#">Home</a></li>
  <li><a href="#">Front End Design</a>
    <ul>
    <!--  <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a>
        <ul>
          <li><a href="#">Resets</a></li>
          <li><a href="#">Grids</a></li>
          <li><a href="#">Frameworks</a></li>
        </ul>
      </li>
      <li><a href="#">JavaScript</a>
        <ul>
          <li><a href="#">Ajax</a></li>
          <li><a href="#">jQuery</a></li>
        </ul>
      </li>-->

      @foreach(\App\League::get() as $league)

                <li style="z-index:100000;"><a href="#">{{$league->name}}</a>
                <ul>
                @foreach($league->season as $season)
                  <li><a href="#">{{$season->name}}</a></li>
                @endforeach
                </ul>
                </li>
     @endforeach
    </ul>
  </li>
  <li><a href="#">WordPress Development</a>
    <ul>
      <li><a href="#">Themes</a></li>
      <li><a href="#">Plugins</a></li>
      <li><a href="#">Custom Post Types</a>
        <ul>
          <li><a href="#">Portfolios</a></li>
          <li><a href="#">Testimonials</a></li>
        </ul>
      </li>
      <li><a href="#">Options</a></li>
    </ul>
  </li>
  <li><a href="#">About Us</a></li>
</ul>


          
        </nav>
      </div>
    </div>
