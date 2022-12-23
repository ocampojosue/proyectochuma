@extends('layouts.theme.app')
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <h3>CREAR PREGUNTA</h3>
      </div>
   </div>
   <br>
   <div class="card">
      <form action="{{route('profesor.questions.store')}}" method="post">
         @csrf
         <div class="card-body row">
            <div class="form-group col-12">
               <form action="#" method="post">
                  @csrf
                  <div class="table-responsive">
                     <table class="table table-bordered" id="dynamic_field">
                        <div class="form-group">
                           <label for="">ELEGIR EVALUACIÓN</label>
                           <select name="evaluation_id" id="inputState" class="form-control">
                              <option value="" selected disabled>-----ELEGIR-----</option>
                              @foreach ($evaluations as $evaluation)
                              <option value="{{$evaluation->id}}">{!!$evaluation->description!!}</option>
                              @endforeach
                           </select>
                           @error('evaluation_id')
                           <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
                           @enderror
                        </div>
                        <tr>
                           <td>
                              <label for="">PREGUNTA</label>
                              <input type="text" name="name" placeholder="PREGUNTA" class="form-control question_list"
                                  />
                                  @error('name')
                                 <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
                                 @enderror
                           <td>
                              <label for="">OPCIONES</label>
                              <input type="text" name="options[]" placeholder="OPCIONES RESPUESTA" class="form-control options_list"
                                  />
                                  @error('options.*')
                                 <small id="helpId" class="text-danger font-weight-bold">{{$message}}</small>
                                 @enderror
                           </td>
                           <td>
                              <div class="form-group text-center">
                                <label for="" class="text-center">CORRECTA</label>
                              <input type="checkbox" name="correct[]" value="1" placeholder="OPCIONES RESPUESTA" class="form-control" />
                              </div>
                           </td>
                           </td>
                           <td width="170px">
                              <div class="form-group">
                                <label for="">ACCIÓN</label>
                                <button type="button" name="addAnswer" id="addAnswer" class="btn btn-success mb-2">
                                    AGREGAR
                                 </button>
                              </div>
                           </td>
                        </tr>
                     </table>
                  </div>
               </form>
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
   });
</script>
<script type="text/javascript">
   $(document).ready(function () {
            var n = 1;
            console.log(n)
            $('#addAnswer').click(function () {
               n++;
               console.log(n)
               if (n >= 3){
                  // $('#addAnswer').attr('disabled', true)
                  $('#addAnswer').removeClass('d-block')
                  $('#addAnswer').addClass('d-none')
               }
               $('#dynamic_field').append('' +
                    '<tr id="row' + n + '" class="dynamic-added">' +
                    '<td>' +
                    '</td>' +
                    '<td>' +
                    '<input type="text" name="options[]"  placeholder="OPCIONES RESPUESTA" class="form-control question_list" />' +
                    '</td>' +
                    '<td>' +
                    '<input type="checkbox" name="correct[]" value="' + n + '" class="form-control question_list" />' +
                    '</td>' +
                    '<td>' +
                    '<button type="button" name="remove" id="' + n + '" class="btn btn-danger btn_remove">X</button>' +
                    '</td>' +
                    '</tr>');
            });
            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                n--;
                console.log(n)
                if (n !=3){
                  //  $('#addAnswer').attr('disabled', false)
                  $('#addAnswer').removeClass('d-none')
                   $('#addAnswer').addClass('d-block')
                }
            });
        });
</script>
@endsection