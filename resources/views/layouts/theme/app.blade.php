<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Sistema Multimedia</title>
   @include('layouts.theme.styles')
</head>

<body class="layout-fixed">
   <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
         <img class="animation__shake" src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo"
            height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <!-- Right navbar links -->
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
               </a>
            </li>
            <li class="nav-item dropdown user-menu">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <span>
                     {{auth()->user()->name}}
                  </span>
               </a>
               <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                  <li class="user-footer">
                     <a class="btn btn-default btn-flat float-right  btn-block " href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off text-red"></i>
                        Salir
                     </a>
                     <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="{{route('home')}}" class="brand-link">
            <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">UE CLUB DE LEONES</span>
         </a>

         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
               </div>
               <div class="info">
                  <a href="{{route('home')}}" class="d-block">{{auth()->user()->name}}</a>
               </div>
            </div>
            <!-- Sidebar Menu -->
            @include('layouts.theme.sidebar')
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               @yield('content-header')
            </div><!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
            @yield('content')
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
         <strong>Copyright &copf; 2022 &nbsp; <a href="https://www.facebook.com/victormanuel.chumacerofigueroa" target="_blank">V.M.C.F</a>.</strong>
         All rights reserved.
         <div class="float-right d-none d-sm-inline-block">
            <b>Hecho con <i class="fa fa-heart text-danger"></i></b>
         </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   @livewireScripts
   @include('layouts.theme.scripts')
</body>

</html>