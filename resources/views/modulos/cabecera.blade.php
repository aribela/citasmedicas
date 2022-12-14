<header class="main-header">
    <a href="{{url('inicio')}}" class="logo">
        <span class="logo-mini"><b>C M</b></span>
        <span class="logo-lg"><b>Clinica medica</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{auth()->user()->name}}
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <p>{{auth()->user()->rol}}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('mis-datos')}}" class="btn btn-primary btn-flat">Mis datos</a>
                            </div>
    
                            <div class="pull-right">
                                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Salir</a>
                            </div>
    
                            <form method="post" action="{{route('logout')}}" id="logout-form">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>