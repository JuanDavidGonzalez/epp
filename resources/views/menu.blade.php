<ul class="nav" id="side-menu">
    <li>
        <a href="{{route('home')}}"><i class="fa fa-home fa-fw"></i> Inicio</a>
    </li>

    @if(Auth::user()->hasRole('coordinator'))
        <li>
            <a href="{{route('item.index')}}"><i class="fa fa-wrench fa-fw"></i> EPPs</a>
        </li>
        <li>
            <a href="{{route('activity.index')}}"><i class="fa fa-list fa-fw"></i> Actividades</a>
        </li>
        <li>
            <a  href="{{route('user.index')}}"><i class="fa fa-users"></i> Usuarios</a>
        </li>
    @endif
</ul>
