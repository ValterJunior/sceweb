<div class="row">

   <div class="col-md-12">

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Dados Gerais</h3>
         </div>

         <div class="box-body">

            <input type="hidden" id="id" name="id" value="{{ old( 'id', $student->id ?? "" ) }}">

            <div class="row">

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group{{ $errors->has('enrollment_number') ? ' has-error' : '' }}">

                     <label for="enrollment_number">Matrícula</label>
                     <input id="enrollment_number" name="enrollment_number" class="form-control" placeholder="Matrícula" maxlength="6" value="{{ old( 'enrollment_number', $student->enrollment_number ?? "" ) }}" {{ $student->id ? "disabled" : "" }} />

                     @if ($errors->has('enrollment_number'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('enrollment_number') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

               <div class="col-md-10 col-sm-8 col-xs-12">

                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                     <label for="name">Nome</label>
                     <input id="name" name="name" class="form-control uppercase" placeholder="Nome do aluno" value="{{ old( 'name', $student->name ?? "" ) }}" />

                     @if ($errors->has('name'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('name') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

            </div>

            <div class="row">

               <div class="col-md-6">

                  <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">

                     <label>Curso</label>

                     <select id="course_id" name="course_id" class="form-control select2">
                        @foreach( $courses as $course )
                           <option value="{{ $course->id }}" {{ old('course_id', $student->course_id ?? "") === $course->id ? 'selected' : '' }} >{{ $course->name }}</option>
                        @endforeach
                     </select>

                     @if ($errors->has('course_id'))
                         <span class="help-block">
                             <strong>{{ $errors->first('course_id') }}</strong>
                         </span>
                     @endif

                  </div>

               </div>

               <div class="col-md-6">

                  <div class="form-group{{ $errors->has('serie_id') ? ' has-error' : '' }}">

                     <label>Série</label>

                     <select id="serie_id" name="serie_id" data-placeholder="Selecione uma série" class="form-control select2"></select>

                     @if ($errors->has('serie_id'))
                         <span class="help-block">
                             <strong>{{ $errors->first('serie_id') }}</strong>
                         </span>
                     @endif

                  </div>

               </div>

            </div>

         </div>
         <!-- /.box -->

      </div>

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Dados Pessoais</h3>
         </div>

         <div class="box-body">

            <div class="row">

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group">
                     <label for="birth_date">Data de Nascimento</label>
                     <input id="birth_date" name="birth_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy', 'placeholder': '__/__/____'" data-mask value="{{ old( 'birth_date', $student->birth_date ?? "" ) }}" />
                  </div>

               </div>

               <div class="col-md-10 col-sm-4 hidden-xs"></div>

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group">

                     <label>Sexo</label>

                     <select class="form-control select2" style="width: 100%;">
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                     </select>

                  </div>

               </div>

            </div>

            <div class="row">

               <div class="col-md-6 col-sm-12 col-xs-12">

                  <div class="form-group">
                     <label for="father_name">Nome do Pai</label>
                     <input id="father_name" name="father_name" class="form-control uppercase" placeholder="Nome do pai" value="{{ old( 'father_name', $student->father_name ?? "" ) }}" />
                  </div>

               </div>

               <div class="col-md-6 col-sm-12 col-xs-12">

                  <div class="form-group">
                     <label for="mother_name">Nome da Mãe</label>
                     <input id="mother_name" name="mother_name" class="form-control uppercase" placeholder="Nome da mãe" value="{{ old( 'mother_name', $student->mother_name ?? "" ) }}" />
                  </div>

               </div>

            </div>

         </div>

      </div>

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Endereço</h3>
         </div>

         <div class="box-body">

            <div class="row">

               <div class="col-md-10 col-sm-8 col-xs-12">

                  <div class="form-group{{ $errors->has('address_name') ? ' has-error' : '' }}">

                     <label for="address_name">Logradouro</label>
                     <input id="address_name" name="address_name" class="form-control uppercase" placeholder="Logradouro" value="{{ old( 'address_name', $student->address_name ?? "" ) }}" />

                     @if ($errors->has('address_name'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('address_name') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group{{ $errors->has('address_number') ? ' has-error' : '' }}">

                     <label for="address_number">Número</label>
                     <input id="address_number" name="address_number" class="form-control" placeholder="Número" value="{{ old( 'address_number', $student->address_number ?? "" ) }}" />

                     @if ($errors->has('address_number'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('address_number') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

            </div>

            <div class="row">

               <div class="col-md-10 col-sm-8 col-xs-12">

                  <div class="form-group{{ $errors->has('address_neighbor') ? ' has-error' : '' }}">

                     <label for="address_neighbor">Bairro</label>
                     <input id="address_neighbor" name="address_neighbor" class="form-control uppercase" placeholder="Bairro" value="{{ old( 'address_neighbor', $student->address_neighbor ?? "" ) }}" />

                     @if ($errors->has('address_neighbor'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('address_neighbor') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group{{ $errors->has('address_city') ? ' has-error' : '' }}">

                     <label for="address_city">Cidade</label>
                     <input id="address_city" name="address_city" class="form-control uppercase" placeholder="Cidade" value="{{ old( 'address_city', $student->address_city ?? "" ) }}" />

                     @if ($errors->has('address_city'))
                  	    <span class="help-block">
                  	        <strong>{{ $errors->first('address_city') }}</strong>
                  	    </span>
                  	@endif

                  </div>

               </div>

            </div>

            <div class="row">

               <div class="col-md-10 col-sm-8 col-xs-12">

                  <div class="form-group">

                     <label>Estado</label>

                     <select name="address_state" id="address_state" class="form-control select2">
                        <option value="PE">Pernambuco</option>
                        <option value="PR">Paraíba</option>
                        <option value="RN">Rio Grande do Norte</option>
                     </select>

                  </div>

               </div>

               <div class="col-md-2 col-sm-4 col-xs-12">

                  <div class="form-group">

                     <label>Telefone</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" data-inputmask='"mask": "(99) 9999-9999"' data-mask value="{{ old( 'phone_number', $student->phone_number ?? "" ) }}" />
                     </div>

                  </div>
               </div>

            </div>

         </div>

      </div>

      <div class="box box-primary">

         <div class="box-header with-border">
            <h3 class="box-title">Outros</h3>
         </div>

         <div class="box-body">

            <div class="row">

               <div class="col-md-2 col-sm-6 col-xs-12">

                  <div class="form-group">

                     <label for="discount">Desconto</label>

                     <div class="input-group">

                        <div class="input-group-addon">
                           <i class="fa fa-dollar"></i>
                        </div>

                        <input id="discount" name="discount" class="form-control" decimal value="{{ old( 'discount', $student->discount ?? "" ) }}" />

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </div>

      <div class="box box-primary">

         <div class="box-footer">
            <div class="pull-right">
               <button type="submit" class="btn btn-primary">{{ $submit_text }}</button>
               <a href="{{ url( action('StudentsController@index') ) }}" class="btn btn-warning">Cancelar</a>
            </div>
         </div>

      </div>

   </div>

</div>

<!-- page script -->
@section('extra_scripts')

   <script>

      $(".select2").select2();
      $("[data-mask]").inputmask();

      setZeroMask( "enrollment_number");

      $(".decimal").inputmask('999.999.999,99', { numericInput: true } );

      $("#course_id").change(function(e){

         loadSeries( $(this).val() );

      });

      $(document).ready(function(){

         @if( $student->serie_id && $student->serie->course->id )
            $("#course_id").val( "{{ $student->serie->course->id }}" );
         @endif

         $("#course_id").trigger("change");

         @if( $student->serie_id )

            var option = $("<option>{{ $student->serie->name }}</option>").val( "{{ $student->serie_id }}" );
            $("#serie_id").append( option ).trigger("change");

         @endif

      });

      function loadSeries( idCourse ){

         $("#serie_id").select2( { ajax: {
               url: "{{ url('series/getSeries') }}/" + idCourse,
               dataType: "json",
               processResults: function(data, params){

                  var selectData = [];

                  selectData.push({ id: '', text: '' });

                  $.each( data, function( index, element){
                     selectData.push( { id: element['_id'], text: element['name'] } );
                  });

                  return { results: selectData };


               },
               cache: true

            }
         });

         $("#serie_id").val( "{{ old('serie_id', $student->serie_id) }}" );

      }

   </script>

@endsection