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
      {{-- <li class="nav-item">
         <a href="{{route('profesor.evaluations.index')}}" class="nav-link @if(Request::is('profesor/evaluations', 'profesor/evaluations/*')) active @endif">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
               EVALUACIONES
            </p>
         </a>
      </li> --}}
      <li class="nav-item @if(Request::is('profesor/evaluations', 'profesor/evaluations/*', 'profesor/questions', 'profesor/questions/*'))menu-is-opening menu-open @endif">
         <a href="#" class="nav-link @if(Request::is('profesor/evaluations', 'profesor/evaluations/*', 'profesor/questions', 'profesor/questions/*')) active @endif">
            <i class="nav-icon fas fa-bookmark"></i>
            <p>
               EVALUACIONES
               <i class="fas fa-angle-left right"></i>
            </p>
         </a>
         <ul class="nav nav-treeview" style="display: @if(Request::is('profesor/evaluations', 'profesor/evaluations/*', 'profesor/questions', 'profesor/questions/*'))block @endif;">
            <li class="nav-item">
               <a href="{{route('profesor.evaluations.index')}}" class="nav-link @if(Request::is('profesor/evaluations', 'profesor/evaluations/*')) active @endif">
                  {{-- <i class="nav-icon fas fa-circle"></i> --}}
                  <i class="far fa-circle nav-icon"></i>
                  <p>EVALUACIONES</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('profesor.questions.index')}}" class="nav-link @if(Request::is('profesor/questions', 'profesor/questions/*')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PREGUNTAS</p>
               </a>
            </li>
            {{-- <li class="nav-item">
               <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPCIONES</p>
               </a>
            </li> --}}
         </ul>
      </li>
   </ul>
</nav>