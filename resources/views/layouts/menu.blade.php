
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-center">

                	@if(Auth::user())
	               		<li @if(check_active_url('home')) class="active" @endif><a href="{{ url('/home') }}"><i class="fa fa-btn fa-home"></i> HOME</a></li>
                        <li><a target="_blank" href="{{ url('/pdf') }}"><i class="fa fa-btn fa-file-pdf-o"></i> PDF</a></li>           
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if(Auth::guest())
                        <li><a href="{{ url('login') }}">Login</a></li>
                        <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                    @else
                        @if(Entrust::hasRole('admin'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-gear"></i> GESTIONE<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="separator" class="divider"></li>                                
                                <li><a href="{{ url('/azienda') }}"><i class="fa fa-btn fa-building-o"></i> Azienda</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/utenti') }}"><i class="fa fa-btn fa-users"></i> Utenti</a></li>
                                <li role="separator" class="divider"></li>                                
                                <li><a href="{{ url('/storico') }}"><i class="fa fa-btn fa-binoculars"></i> Storico</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/uploads') }}"><i class="fa fa-btn fa-upload"></i> Uploads</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/backup') }}"><i class="fa fa-btn fa-database"></i> Backup</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/utente/password') }}"><i class="fa fa-btn fa-lock"></i> Password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                                <li role="separator" class="divider"></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
   