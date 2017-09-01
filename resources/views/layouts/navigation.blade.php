
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{  Auth::user()->nombre }} {{ Auth::user()->apellidos }}</strong>
                            </span> <span class="text-muted text-xs block">{{ session()->get('perfil')->perfil }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    EVAL
                </div>
            </li>
            @foreach(session()->get('modulos') as $mod)

                <li class="">
                    <a href="index.html"><i class="fa {{ $mod->image }}"></i> <span class="nav-label">{{ $mod->modulo }}</span> <span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse" style="height: 0px;">
                        @foreach(array_get(session('paginas'),$mod->id) as $pagi)
                            <li><a href="{{route($pagi[2]) }}"><i class="fa fa-superpowers" aria-hidden="true"></i>{{ $pagi[0] }}</a></li>
                            @endforeach

                    </ul>
                </li>
            @endforeach

        </ul>

    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</nav>



