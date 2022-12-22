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
         <a href="{{route('admin.themes.index')}}" class="nav-link @if(Request::is('admin/themes', 'admin/themes/*')) active @endif">
            <i class="nav-icon fas fa-box"></i>
            <p>
               TEMAS
            </p>
         </a>
      </li>
   </ul>
</nav>