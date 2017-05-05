<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Pascal's Blog</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


     Custom styles for this template 
    <link href="{{ URL::asset('css/blog.css') }}" rel="stylesheet" type="text/css" >

     <script src="{{ asset('js/app.js') }}"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
       /* Dropdown Button */
       ul {
  list-style: none;
  padding: 0;
  margin: 0;
  background: #1bc2a2;
}

ul li {
  display: block;
  position: relative;
  float: left;
  background: #1bc2a2;
}

li ul { display: none; }

ul li a {
  display: block;
  padding: 1em;
  text-decoration: none;
  white-space: nowrap;
  color: #fff;
}

ul li a:hover { background: #2c3e50; }

li:hover > ul {
  display: block;
  position: absolute;
}

li:hover li { float: none; }

li:hover a { background: #1bc2a2; }

li:hover li a:hover { background: #2c3e50; }

.main-navigation li ul li { border-top: 0; }

ul ul ul {
  left: 100%;
  top: 0;
}

ul:before,
ul:after {
  content: " "; /* 1 */
  display: table; /* 2 */
}

ul:after { clear: both; }
    </style>
  </head>

  <body>



    <div class="container">
        <div class="row">
          @yield('content')

        </div>
    </div>





    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
