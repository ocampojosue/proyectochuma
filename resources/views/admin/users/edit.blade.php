@extends('layouts.theme.app')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <h3>CREAR USUARIO</h3>
      </div>
   </div>
   <br>
   <div class="card">
      <form action="{{route('admin.users.update', $user)}}" method="POST">
         @csrf
         @method('PUT')
         <div class="card-body row">
            <div class="form-group col-12">
               <label for="">NOMBRES Y APELLIDOS</label>
               <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{$user->name}}">
               @error('name')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-8">
               <label for="">CORREO</label>
               <input type="text" name="email" id="email" class="form-control" placeholder="" value="{{$user->email}}">
               @error('email')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-4">
               <label>ESTADO</label>
               <select class="form-control" name="status" id="status">
                  <option disabled selected>-----Elegir-----</option>
                  <option value="ACTIVE" {{$user->status == 'ACTIVE' ? 'selected' : ''}}>ACTIVO</option>
                  <option value="INACTIVE" {{$user->status == 'INACTIVE' ? 'selected' : ''}}>INACTIVO</option>
               </select>
            </div>
            <div class="form-group col-12">
               <label for="">CONTRASEÑA</label>
               <input type="text" name="password" id="password" class="form-control" placeholder="">
               @error('password')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-12">
               <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
@section('styles')
@endsection
@section('scripts')
@endsection