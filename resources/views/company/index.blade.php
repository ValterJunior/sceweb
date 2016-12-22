@extends('layouts.app')

@section('content')

	{!!  Form::open( [ 'method' => 'PUT', 'action' => ['CompanyController@update', $company->_id] ] ) !!}
      
		<div class="row">

		   <div class="col-md-12">

		      <div class="box box-primary">

		         <div class="box-header with-border">
		            <h3 class="box-title">Dados Institucionais</h3>
		         </div>

		         <div class="box-body">

		            <input type="hidden" id="id" name="id" value="{{ old( 'id', $company->id ?? "" ) }}">

		            <div class="row">

		            	<div class="col-md-2 col-xs-12">
		            		
		                  <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">

		                     <label for="cnpj">CNPJ</label>
		                     <input type="text" id="cnpj" name="cnpj" class="form-control" data-inputmask='"mask": "99.999.999/9999-99"' data-mask value="{{ old( 'cnpj', $company->cnpj ?? "" ) }}" />

		                     @if ($errors->has('cnpj'))
		                  	    <span class="help-block">
		                  	        <strong>{{ $errors->first('cnpj') }}</strong>
		                  	    </span>
		                  	@endif

		                  </div>

		            	</div>

		               <div class="col-md-10 col-xs-12">

		                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

		                     <label for="name">Nome</label>
		                     <input type="text" id="name" name="name" class="form-control uppercase" placeholder="Nome da instituição" value="{{ old( 'name', $company->name ?? "" ) }}" />

		                     @if ($errors->has('name'))
		                  	    <span class="help-block">
		                  	        <strong>{{ $errors->first('name') }}</strong>
		                  	    </span>
		                  	@endif

		                  </div>

		               </div>

		            </div>

		            <div class="row">
		            	
						<div class="col-md-2 col-xs-12">

							<div class="form-group">
								<label for="operation_act_number">Ato de funcionamento</label>
								<input type="text" id="operation_act_number" name="operation_act_number" class="form-control" data-inputmask='"mask": "9.999"' data-mask value="{{ old( 'operation_act_number', $company->operation_act_number ?? "" ) }}" />
							</div>
							
						</div>

						<div class="col-md-2 col-xs-12">

							<div class="form-group">
								<label for="ploy_date">Data de ofício</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" id="ploy_date" name="ploy_date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy', 'placeholder': '__/__/____'" data-mask value="{{ old( 'ploy_date', $company->ploy_date ?? "" ) }}" />
								</div>
							</div>
							
						</div>


		            </div>

		         </div>
		         <!-- /.box -->

		      </div>

		   </div>

		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="box box-primary">

					<div class="box-header with-border">
						<h3 class="box-title">Endereço</h3>
					</div>

					<div class="box-body">

						<div class="row">

							<div class="col-md-8 col-xs-12">

							  <div class="form-group{{ $errors->has('address_name') ? ' has-error' : '' }}">

							     <label for="address_name">Logradouro</label>
							     <input type="text" id="address_name" name="address_name" class="form-control uppercase" placeholder="Logradouro" value="{{ old( 'address_name', $company->address_name ?? "" ) }}" />

							     @if ($errors->has('address_name'))
							  	    <span class="help-block">
							  	        <strong>{{ $errors->first('address_name') }}</strong>
							  	    </span>
							  	@endif

							  </div>

							</div>

							<div class="col-md-1 col-xs-12">

							  <div class="form-group{{ $errors->has('address_number') ? ' has-error' : '' }}">

							     <label for="address_number">Número</label>
							     <input type="text" id="address_number" name="address_number" class="form-control uppercase" value="{{ old( 'address_number', $company->address_number ?? "" ) }}" />

							     @if ($errors->has('address_number'))
							  	    <span class="help-block">
							  	        <strong>{{ $errors->first('address_number') }}</strong>
							  	    </span>
							  	@endif

							  </div>

							</div>

							<div class="col-md-3 col-xs-12">

							  <div class="form-group{{ $errors->has('address_neighbor') ? ' has-error' : '' }}">

							     <label for="address_neighbor">Bairro</label>
							     <input type="text" id="address_neighbor" name="address_neighbor" class="form-control uppercase" placeholder="Bairro" value="{{ old( 'address_neighbor', $company->address_neighbor ?? "" ) }}" />

							     @if ($errors->has('address_neighbor'))
							  	    <span class="help-block">
							  	        <strong>{{ $errors->first('address_neighbor') }}</strong>
							  	    </span>
							  	@endif

							  </div>

							</div>


						</div>

						<div class="row">

							<div class="col-md-2 col-xs-12">

							  <div class="form-group">
							     <label for="address_complement">Complemento</label>
							     <input type="text" id="address_complement" name="address_complement" class="form-control uppercase" value="{{ old( 'address_complement', $company->address_complement ?? "" ) }}" />
							  </div>

							</div>

							<div class="col-md-2 col-xs-12">

								<div class="form-group{{ $errors->has('address_postalcode') ? ' has-error' : '' }}">

									<label for="address_postalcode">CEP</label>
									<input type="text" id="address_postalcode" name="address_postalcode" class="form-control" data-inputmask='"mask": "999.999-99"' data-mask value="{{ old( 'address_postalcode', $company->address_postalcode ?? "" ) }}" />

									@if ($errors->has('address_postalcode'))
										<span class="help-block">
										    <strong>{{ $errors->first('address_postalcode') }}</strong>
										</span>
									@endif

								</div>

							</div>

							<div class="col-md-2 col-xs-12">

								<div class="form-group">

									<label for="address_state">Estado</label>

									<select id="address_state" name="address_state" class="form-control select2"></select>

								</div>

							</div>

							<div class="col-md-2 col-xs-12">

								<div class="form-group">

									<label for="address_city">Cidade</label>

									<select id="address_city" name="address_city" class="form-control select2"></select>

								</div>

							</div>

							<div class="col-md-1 col-xs-12">

								<div class="form-group">
									<label for="phone_areacode">DDD</label>
									<input type="text" id="phone_areacode" name="phone_areacode" class="form-control" data-inputmask='"mask": "99"' data-mask value="{{ old( 'phone_areacode', $company->phone_areacode ?? "" ) }}" />
								</div>

							</div>

							<div class="col-md-3 col-xs-12">

								<div class="form-group">

									<label for="phone_number">Telefone</label>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input type="text" id="phone_number" name="phone_number" class="form-control" data-inputmask='"mask": "9999-9999"' data-mask value="{{ old( 'phone_number', $company->phone_number ?? "" ) }}" />
									</div>

								</div>

							</div>

						</div>

						<div class="row">

							<div class="col-md-3 col-xs-12">

							  <div class="form-group">

							     <label for="email">E-mail</label>

							     <div class="input-group">
							     	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							     	<input type="text" id="email" name="email" class="form-control" placeholder="E-mail da instituição" value="{{ old( 'email', $company->email ?? "" ) }}" />
							     </div>

							  </div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="box box-primary">

					<div class="box-header with-border">
						<h3 class="box-title">Apresentação</h3>
					</div>

					<div class="box-body">

						<div class="row" style="margin-bottom: 15px">

							<div class="col-md-12">
								<label for="slogan">Slogan</label>
								<input type="text" id="slogan" name="slogan" class="form-control" placeholder="Frase que representa a instituição" value="{{ old( 'slogan', $company->slogan ?? "" ) }}">
							</div>

						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="logo">Logomarca</label>
							</div>
						</div>

						<div class="row">

							<div class="col-md-2" style="padding-right: 0px; max-width: 150px;">
								<img src="/img/logo_placeholder.png" id="img-logo" alt="Company Image" class="img-thumbnail" style="height: 100px"></img>
							</div>

							<div class="col-md-10">

								<label class="btn btn-default btn-file">
								    Selecionar imagem <input type="file" id="file-logo" style="display: none;">
								</label>
								<p class="help-block">Tamanho máximo da imagem: 2 Mbs.</p>

							</div>

						</div>

					</div>

			         <div class="box-footer">
			            <div class="pull-right">
			               <button type="submit" class="btn btn-primary">Salvar</button>
			               <a href="{{ url( '/' ) }}" class="btn btn-warning">Cancelar</a>
			            </div>
			         </div>

				</div>

			</div>

		</div>

	{!! Form::close() !!}

@endsection

<!-- page script -->
@section('extra_scripts')

	<script>

		$(".select2").select2();
		$("[data-mask]").inputmask();

		$("#file-logo").change(function(){

			var file = document.querySelector('#file-logo').files[0];
		 	var reader = new FileReader();

		 	reader.addEventListener("load", function(){
		 		$("#img-logo").attr("src", reader.result)
		 	}, false);

		 	if(file){
		 		reader.readAsDataURL(file);
		 	}

		 });		

	</script>

@endsection

