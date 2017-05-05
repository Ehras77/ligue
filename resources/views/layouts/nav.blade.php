    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="/">Home</a>
          
          @if(Auth::check())
          <a class="blog-nav-item ml-auto pull-right" href="#" onclick="alert('vous venez de cliquer sur votre nom ! Bravo !')"> Bonjour, {{Auth::user()->name}}</a>
          <a class="blog-nav-item ml-auto pull-right" href="/logout">Log out</a>
            @if(Auth::user()->isEditor(Auth::user()))
              <a class="blog-nav-item ml-auto pull-right" href="/posts/create">Nouveau Post</a>
              <a class="blog-nav-item ml-auto pull-right" href="/posts/{{Auth::user()->id}}/posts">Mes Posts</a>
            @endif
          @else
          <a class="blog-nav-item ml-auto pull-right" href="/register">Register</a>
          <a class="blog-nav-item ml-auto pull-right" href="/login">Login</a>

          @endif
        </nav>
      </div>
    </div>
