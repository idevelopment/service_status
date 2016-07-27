<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iDevelopment - Service status</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Arimo:400,700' rel='stylesheet' type='text/css'>


    <!-- Styles -->
    <!-- TODO: Set local -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://timelined.andriaus.lt/css/timeline.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- JavaScripts -->
    <!-- TODO: set local-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery.formtowizard.js') }}"></script>

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class="fa fa-cog"></i> Service Status
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Authentication Links -->
                    @if (Auth::guest())
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/maintenance') }}">Maintenance</a></li>
                    <li><a href="{{ url('/status') }}">Network status</a></li>
                    <li><a href="{{ url('/abuse') }}">Abuse report</a></li>
                </ul>
                  <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">                    
                        <li><a href="{{ url('/login') }}">Login</a></li>
                </ul>
                    @else
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                     <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenance <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                       <li><a href="#">Schedule</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">Search</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">All maintenance</a></li>
                    </ul>
                   </li>
                    <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Incidents <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                       <li><a href="{{ route('incidents.create') }}">Report incident</a></li>
                       <li><a href="{{ route('incidents.index') }}">All incidents</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">Server management</a></li>
                       <li><a href="#">Service management</a></li>
                       <li role="separator" class="divider"></li>
                       <li><a href="#">Update settings</a></li>
                    </ul>
                   </li>
                    <li><a href="{{ url('/abuse') }}">Abuse report</a></li>
                </ul>
                  <!-- Right Side Of Navbar -->                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-cogs"></i> Change account</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    

</body>
</html>
