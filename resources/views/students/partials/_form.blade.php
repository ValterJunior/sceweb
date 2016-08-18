<div class="row">

	<div class="col-md-12">

      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">Dados Gerais</h3>
        </div>

        <div class="box-body">

        	<div class="row">

        		<div class="col-md-2 col-sm-4 col-xs-12">

		        	<div class="form-group">
		        		<label for="enrollment_number">Matrícula</label>
                  <input id="enrollment_number" name="enrollment_number" class="form-control" placeholder="Matrícula" value="{{ old('enrollment_number') }}" />
		        	</div>

        		</div>

        		<div class="col-md-10 col-sm-8 col-xs-12">

		        	<div class="form-group">
		        		<label for="name">Nome</label>
                  <input id="name" name="name" class="form-control" placeholder="Nome do aluno" value="{{ old('name') }}" />
		        	</div>

        		</div>

        	</div>

        	<div class="row">

        			<div class="col-md-6">

                <div class="form-group">

                  <label>Curso</label>

                  <select class="form-control select2" style="width: 100%;">
                    <option>Educação infantil</option>
                    <option>Ensino fundamental</option>
                    <option>Ensino médio</option>
                  </select>

                </div>

        			</div>

        			<div class="col-md-6">

                <div class="form-group">

                  <label>Série</label>

                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Maternalzinho</option>
                    <option>Pré-alfabetização</option>
                    <option>Alfabetização</option>
                  </select>

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
                <input id="birth_date" name="birth_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy', 'placeholder': '__/__/____'" data-mask value="{{ old('birth_date') }}" />
              </div>

            </div>

            <div class="col-md-10 col-sm-4 hidden-xs"></div>

            <div class="col-md-2 col-sm-4 col-xs-12">

              <div class="form-group">

                <label>Sexo</label>

                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Masculino</option>
                  <option>Feminino</option>
                </select>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12">

              <div class="form-group">
                <label for="father_name">Nome do Pai</label>
                <input id="father_name" name="father_name" class="form-control" placeholder="Nome do pai" value="{{ old('father_name') }}" />
              </div>

            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">

              <div class="form-group">
                <label for="mother_name">Nome da Mãe</label>
                <input id="mother_name" name="mother_name" class="form-control" placeholder="Nome da mãe" value="{{ old('mother_name') }}" />
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

              <div class="form-group">
                <label for="address_name">Logradouro</label>
                <input id="address_name" name="address_name" class="form-control" placeholder="Logradouro" value="{{ old('address_name') }}" />
              </div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-12">

              <div class="form-group">
                <label for="address_number">Número</label>
                <input id="address_number" name="address_number" class="form-control" placeholder="Número" value="{{ old('address_number') }}" />
              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-md-10 col-sm-8 col-xs-12">

              <div class="form-group">
                <label for="address_neighbor">Bairro</label>
                <input id="address_neighbor" name="address_neighbor" class="form-control" placeholder="Bairro" value="{{ old('address_neighbor') }}" />
              </div>

            </div>

            <div class="col-md-2 col-sm-4 col-xs-12">

              <div class="form-group">
                <label for="address_city">Cidade</label>
                <input id="address_city" name="address_city" class="form-control" placeholder="Cidade" value="{{ old('address_city') }}" />
              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-md-10 col-sm-8 col-xs-12">

                <div class="form-group">

                  <label>Estado</label>

                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Pernambuco</option>
                    <option>Paraíba</option>
                    <option>Rio Grande do Norte</option>
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
                  <input type="text" id="phone_number" name="phone_number" class="form-control" data-inputmask='"mask": "(99) 9.9999-9999"' data-mask value="{{ old('phone_number') }}" />
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

                  <input id="discount" name="discount" class="form-control" decimal />

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
<script>

   $(".select2").select2();
   $("[data-mask]").inputmask();
   $(".decimal").inputmask('999.999.999,99', { numericInput: true } );

</script>
