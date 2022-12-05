@extends('layouts.theme.app')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<div class="container-fluid">
    @livewire('home-controller')
    {{-- @include('livewire.home-controller') --}}
    {{-- <div class="content">
        <div class="container-fluid">
            <div class="card-header">
                <a href="https://proyecto.test/admin/categorias/create" class="btn btn-primary">Nueva Categoría</a>
            </div>
            <div class="card">
                <div class="card body py-2 px-1">
                    <table id="productos" class="table table striped shadow-lg mt-4">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>FECHA</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tremayne Halvorson</td>
                                <td>quia excepturi facilis</td>

                                <td>15 agosto 2022 | 18:43 </td>

                                <td width="150px">
                                    <form action="https://proyecto.test/admin/categorias/1" method="POST">
                                        <a href="https://proyecto.test/admin/categorias/1/edit"
                                            class="btn btn-primary btn-sm">Editar</a>
                                        <input type="hidden" name="_method" value="delete"> <input type="hidden"
                                            name="_token" value="zCLidoXEMGmDelYdlExJQTuHMfEpdQVrCZoScWCL"> <input
                                            type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection