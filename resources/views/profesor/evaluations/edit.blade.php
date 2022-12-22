@extends('layouts.theme.app')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <h3>ACTUALIZAR EVALUACIÓN</h3>
      </div>
   </div>
   <br>
   <div class="card">
      <form action="{{route('profesor.evaluations.update',$evaluation)}}" method="post">
         @csrf
         @method('PUT')
         <div class="card-body row">
            <div class="form-group col-12">
               <label for="">DESCRIPCIÓN DE LA EVALUACIÓN</label>
               <textarea name="description" id="description" class="form-control" cols="30" rows="2">{{$evaluation->description}}</textarea>
               @error('description')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-12">
               <label>TEMA</label>
               <select class="form-control" name="theme_id" id="theme_id">
                  <option disabled selected>-----Elegir-----</option>
                  @foreach ($themes as $theme)
                  <option value="{{$theme->id}}" {{$evaluation->theme_id == $theme->id ? 'selected' : ''}}>{{$theme->name}}</option>
                  @endforeach
               </select>
               @error('theme_id')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-6">
               <label for="">FECHA EVALUACIÓN</label>
               <input type="date" name="date_evaluation" id="date_evaluation" class="form-control" value="{{$evaluation->date_evaluation}}">
               @error('date_evaluation')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-6">
               <label>ESTADO</label>
               <select class="form-control" name="status" id="status">
                  <option disabled selected>-----Elegir-----</option>
                  <option value="ACTIVE" {{$evaluation->status == 'ACTIVE' ? 'selected' : ''}}>ACTIVO</option>
                  <option value="LOCKED" {{$evaluation->status == 'LOCKED' ? 'selected' : ''}}>BLOQUEADO</option>
               </select>
               @error('status')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
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
<link rel="stylesheet" href="{{asset('template/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('scripts')
<script src="{{asset('template/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('template/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
   $('#description').summernote();
   $('#theme_id').select2({
      theme: 'bootstrap4'
   })
</script>
@endsection