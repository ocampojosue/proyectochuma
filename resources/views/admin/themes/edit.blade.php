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
      <form action="{{route('admin.themes.update', $theme)}}" method="POST">
         @csrf
         @method('PUT')
         <div class="card-body row">
            <div class="form-group col-12">
               <label for="">NOMBRES Y APELLIDOS</label>
               <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{$theme->name}}">
               @error('name')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-12">
               <label>ESTADO</label>
               <select class="form-control" name="status" id="status">
                  <option disabled selected>-----Elegir-----</option>
                  <option value="ACTIVE" {{$theme->status == 'ACTIVE' ? 'selected' : ''}}>ACTIVO</option>
                  <option value="LOCKED" {{$theme->status == 'LOCKED' ? 'selected' : ''}}>INACTIVO</option>
               </select>
            </div>
            <div class="form-group col-12">
               <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
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