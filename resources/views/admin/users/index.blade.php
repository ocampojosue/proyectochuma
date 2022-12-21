@extends('layouts.theme.app')
{{-- @section('content-header')
<h1>USUARIOS</h1>
@endsection --}}
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-6">
         <h3>USUARIOS</h3>
      </div>
      <div class="col-6">
         <a href="{{route('admin.users.create')}}" class="btn btn-primary float-right">NUEVO USUARIO</a>
      </div>
   </div>
   <br>
   <div class="card">
      <div class="card-body py-2 px-1">
         <table id="users" class="table table striped shadow-lg mt-4">
            <thead class="bg-primary text-white">
               <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>EMAIL</th>
                  <th>ESTADO</th>
                  <th>CREACIÓN</th>
                  <th>ACCIONES</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($users as $user)
               <tr>
                  <td>{{ $user->id}}</td>
                  <td>{{ $user->name}}</td>
                  <td>{{ $user->email}}</td>
                  <td>
                     <span class="badge badge-{{$user->status == 'ACTIVE' ? 'success' : 'danger'}} px-2 py-1">
                        {{$user->status == 'ACTIVE' ? 'ACTIVO' : 'INACTIVO'}}
                     </span>
                  </td>
                  <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y, H:i') }}</td>
                  <td width="150px">
                     <form action="{{route('admin.users.destroy',$user)}}" method="POST">
                        <a href="{{route('admin.users.edit',$user)}}" class="btn btn-primary btn-sm {{$loop->iteration == 1 ? 'd-none' : ''}}">Editar</a>
                        @method('delete')
                        @csrf
                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm {{$loop->iteration == 1 ? 'd-none' : ''}}">
                     </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
            {{-- <button id="demo">DEMO</button> --}}
         </table>
      </div>
   </div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/toastr/toastr.min.css')}}">
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function () {
            $('#users').DataTable({
                "language" : {
                    "search" : "Buscar",
                    "lengthMenu" : "Mostrar _MENU_ registros por pagina",
                    "info" : "Mostrando pagina _PAGE_ de _PAGES_",
                    "pageLength": 5,
                    "paginate" : {
                        "previous" : "Anterior",
                        "next" : "Siguiente",
                        "first" : "primero",
                        "last" : "Ultimo"
                    }   
                },
                "lengthMenu" : [5, 7, 10, 15, 25],
            });
        });
</script>
<script src="{{asset('template/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('template/plugins/toastr/toastr.min.js')}}"></script>
<script>
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500,
      timerProgressBar: true,
      padding: '10px 10px 10px 10px',
   });
   // $('#demo').click(function() {
   //    Toast.fire({
   //       icon: 'success',
   //       title: 'USUARIO CREADO CORRECTAMENTE'
   //    })
   // });
   // Toast.fire({
   // icon: 'success',
   // title: 'USUARIOS CREADO CORRECTAMENTE',
   // // titleText: 'USUARIO CREADO CORRECTAMENTE',
   // // text: 'USUARIO CREADO CORRECTAMENTE',
   // })
</script>
   {{-- @if(session('user-added'))
      <script>
         setTimeout(() => {
            Toast.fire({
            icon: 'success',
            title: 'USUARIO CREADO CORRECTAMENTE'
            })
         }, 700);
         
      </script>
   @endif
   @if(session('user-updated'))
      <script>
         setTimeout(() => {
            Toast.fire({
               icon: 'info',
               title: 'USUARIO AXTUALIZADO CORRECTAMENTE'
            })
         }, 700);
      </script>
   @endif
   @if(session('user-deleted'))
      <script>
         setTimeout(() => {
            Toast.fire({
               icon: 'error',
               title: 'USUARIO ELIMINADO'
            })
         }, 700);
      </script>
   @endif --}}
   @if(Session::get('alerts'))
      @php
         $type = Session::get('alerts')[0];
         $message = Session::get('alerts')[1];
      @endphp
      <script>
         setTimeout(() => {
            Toast.fire({
               icon: @json($type),
               title: @json($message)
            })
         }, 700);
      </script>
      {{Session::forget('alerts')}};
   @endif
@endsection