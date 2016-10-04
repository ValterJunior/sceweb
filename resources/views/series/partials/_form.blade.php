<div class="row">

   <div class="col-md-12">

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Série</h3>
         </div>

         <div class="box-body">

            <input type="hidden" name="course_id" value="{{ $idCourse }}">
            <input type="hidden" id="id" name="id" value="{{ old( 'id', $serie->id ?? "" ) }}">

            <div class="row">

               <div class="col-md-12">

                  <div class="form-group">

                     <label>Curso</label>
                     <p>{{ $courseName }}</p>
                     
                  </div>

               </div>

            </div>

            <div class="row">

               <div class="col-md-10">

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                     <label for="name">Nome</label>
                     <input id="name" name="name" class="form-control" placeholder="Nome da série" value="{{ old( 'name', $serie->name ?? "" ) }}" />

                     @if ($errors->has('name'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('name') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

               <div class="col-md-2">

                  <div class="form-group">

                     <label>Ordem</label>
                     <p><span class="badge">{{ $serie->order }}</span></p>
                     
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
