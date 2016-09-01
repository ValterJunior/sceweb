<div class="row">

   <div class="col-md-12">

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Série</h3>
         </div>

         <div class="box-body">

            <input type="hidden" id="id" name="id" value="{{ old( 'id', $serie->id ?? "" ) }}">

            <div class="row">

               <div class="col-md-6">

                  <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">

                     <label for="course_id">Curso</label>
                     <select name="course_id" id="course_id" class="form-control select2" style="width: 100%;" placeholder-data="Escolha o curso">
                        <option value=""></option>
                        @foreach( $courses as $course )
                           <option value="{{ old( 'course_id', $course->id ?? "" ) }}" {!! isset($serie) && $serie->course == $course ? "selected" : "" !!} >{{ $course->name }}</option>
                        @endforeach
                     </select>

                     @if ($errors->has('course_id'))
                         <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                         </span>
                     @endif

                  </div>

               </div>

               <div class="col-md-6">

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                     <label for="name">Nome</label>
                     <input id="name" name="name" class="form-control" placeholder="Nome do curso" value="{{ old( 'name', $serie->name ?? "" ) }}" />

                     @if ($errors->has('name'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('name') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

            </div>

         </div>
         <!-- /.box -->

         <div class="box-footer">
            <div class="pull-right">
               <button type="submit" class="btn btn-primary">{{ $submit_text }}</button>
               <a href="{{ url( action('SeriesController@index') ) }}" class="btn btn-warning">Cancelar</a>
            </div>
         </div>

      </div>

   </div>

</div>

@section('extra_scripts')
   <!-- page script -->
   <script>
      $('.select2').select2();
   </script>
@endsection
