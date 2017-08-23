
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Example user</strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    EVAL
                </div>
            </li>
            @foreach($modulos as $mod)
                <li class="">
                    <a href="index.html"><i class="fa {{ $mod->image }}"></i> <span class="nav-label">{{ $mod->modulo }}</span> <span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse" style="height: 0px;">
                        @foreach($paginas[$mod->id] as $pagi)
                            <li><a href="{{ $pagi[2] }}">{{ $pagi[0] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach

        </ul>

    </div>
</nav>



