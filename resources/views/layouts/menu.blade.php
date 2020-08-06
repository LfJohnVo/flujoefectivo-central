<li class="{{ Request::is('depositos*') ? 'active' : '' }}">
    <a href="{{ route('depositos.index') }}"><i class="fa fa-edit"></i><span>Depositos</span></a>
</li>

<li class="{{ Request::is('distritos*') ? 'active' : '' }}">
    <a href="{{ route('distritos.index') }}"><i class="fa fa-edit"></i><span>Distritos</span></a>
</li>

<li class="{{ Request::is('gerentes*') ? 'active' : '' }}">
    <a href="{{ route('gerentes.index') }}"><i class="fa fa-edit"></i><span>Gerentes</span></a>
</li>

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{{ route('proyectos.index') }}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>

<!--<li class="{{ Request::is('rols*') ? 'active' : '' }}">
    <a href="{{ route('rols.index') }}"><i class="fa fa-edit"></i><span>Rols</span></a>
</li>-->

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

