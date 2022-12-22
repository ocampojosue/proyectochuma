<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
         <a href="{{route('admin.users.index')}}" class="nav-link @if(Request::is('admin/users', 'admin/users/*')) active @endif">
            <i class="nav-icon fas fa-user"></i>
            <p>
               USUARIOS
            </p>
         </a>
      </li>
      <li class="nav-item">
         <a href="{{route('profesor.themes.index')}}" class="nav-link @if(Request::is('profesor/themes', 'profesor/themes/*')) active @endif">
            <i class="nav-icon fas fa-box"></i>
            <p>
               TEMAS
            </p>
         </a>
      </li>
      <li class="nav-item">
         <a href="{{route('profesor.evaluations.index')}}" class="nav-link @if(Request::is('profesor/evaluations', 'profesor/evaluations/*')) active @endif">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
               EVALUACIONES
            </p>
         </a>
      </li>
   </ul>
</nav>