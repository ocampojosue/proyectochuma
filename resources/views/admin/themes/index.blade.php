@extends('layouts.theme.app')
{{-- @section('content-header')
<h1>USUARIOS</h1>
@endsection --}}
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-6">
         <h3>TEMAS</h3>
      </div>
      <div class="col-6">
         <a href="{{route('admin.themes.create')}}" class="btn btn-primary float-right">NUEVO TEMA</a>
      </div>
   </div>
   <br>
   <div class="card">
      <div class="card-body py-2 px-1">
         <table id="themes" class="table table striped shadow-lg mt-4">
            <thead class="bg-primary text-white">
               <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>ESTADO</th>
                  <th>PROFESOR</th>
                  <th>CREACIÓN</th>
                  <th>ACCIONES</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($themes as $theme)
               <tr>
                  <td>{{ $theme->id}}</td>
                  <td>{{ $theme->name}}</td>
                  <td>
                     <span class="badge badge-{{$theme->status == 'ACTIVE' ? 'success' : 'danger'}} px-2 py-1">
                        {{$theme->status == 'ACTIVE' ? 'ACTIVO' : 'INACTIVO'}}
                     </span>
                  </td>
                  <td>{{ $theme->teacher->name}}</td>
                  <td>{{ \Carbon\Carbon::parse($theme->created_at)->format('d-m-Y, H:i') }}</td>
                  <td width="150px">
                     <form action="{{route('admin.themes.destroy',$theme)}}" method="POST">
                        <a href="{{route('admin.themes.edit',$theme)}}" class="btn btn-primary btn-sm">Editar</a>
                        @method('delete')
                        @csrf
                        <input type="submit" value="Eliminar" class="btn btn-danger btn-sm ">
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
            $('#themes').DataTable({
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
      timer: 2000,
      timerProgressBar: true,
      padding: '10px 10px 10px 10px',
   });
</script>
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