<div class="row">

   <div class="col-md-12">

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Dados Gerais</h3>
         </div>

         <div class="box-body">

            <input type="hidden" id="id" name="id" value="{{ old( 'id', $course->id ?? "" ) }}">

            <div class="row">

               <div class="col-md-12">

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                     <label for="name">Nome</label>
                     <input id="name" name="name" class="form-control" placeholder="Nome do curso" value="{{ old( 'name', $course->name ?? "" ) }}" />

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
               <a href="{{ url( action('CoursesController@index') ) }}" class="btn btn-warning">Cancelar</a>
            </div>
         </div>

      </div>

   </div>

</div>
