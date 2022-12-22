@extends('layouts.theme.app')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <h3>CREAR TEMA</h3>
      </div>
   </div>
   <br>
   <div class="card">
      <form action="{{route('admin.themes.store')}}" method="post">
         @csrf
         <div class="card-body row">
            <div class="form-group col-12">
               <label for="">NOMBRE DEL TEMA</label>
               <input type="text" name="name" id="name" class="form-control" placeholder="NOMBRE DEL TEMA">
               @error('name')
                  <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-12">
               <label>ESTADO</label>
               <select class="form-control" name="status" id="status">
                  <option disabled selected>-----Elegir-----</option>
                  <option value="ACTIVE">ACTIVO</option>
                  <option value="LOCKED">INACTIVO</option>
               </select>
               @error('status')
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
<link rel="stylesheet" href="{{asset('template/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('scripts')
<script src="{{asset('template/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
   $('#statuss').select2({
      theme: 'bootstrap4'
   })
</script>
@endsection