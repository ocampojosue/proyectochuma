@extends('layouts.theme.app')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <h3>EDITAR OPCIÓN</h3>
      </div>
   </div>
   <br>
   <div class="card">
      <form action="{{route('profesor.options.update', $option)}}" method="post">
         @csrf
         @method('PUT')
         <div class="card-body row">
            <div class="form-group col-8">
               <label for="">OPCIÓN</label>
               <input type="text" name="option" id="option" class="form-control" value="{{$option->option}}">
               @error('option')
               <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
               @enderror
            </div>
            <div class="form-group col-4">
               <label for="">PUNTAJE</label>
               <input type="number" name="correct" id="correct" class="form-control" value="{{$option->correct}}">
               @error('correct')
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