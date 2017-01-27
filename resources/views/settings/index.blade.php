@extends('layouts.app')

@section('content')

	{!!  Form::open( [ 'id' => 'settings-form', 'method' => 'PUT', 'action' => ['SettingsController@update', 0] ] ) !!}
      
		<div class="row">

		   <div class="col-md-12">

		      <div class="box box-primary">

		         <div class="box-header with-border">
		            <h3 class="box-title">Gestor</h3>
		         </div>

		         <div class="box-body">

		            <input type="hidden" id="id" name="id" value="{{ old( 'id', $settings->id ?? "" ) }}">

		            <div class="row">

		            	<div class="col-md-2 col-xs-12">
		            		
		                  <div class="form-group{{ $errors->has('manager_cpf') ? ' has-error' : '' }}">

		                     <label for="manager_cpf">CPF</label>
		                     <input type="text" id="manager_cpf" name="manager_cpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask value="{{ old( 'manager_cpf', $settings->manager_cpf ?? "" ) }}" />

		                     @if ($errors->has('manager_cpf'))
		                  	    <span class="help-block">
		                  	        <strong>{{ $errors->first('manager_cpf') }}</strong>
		                  	    </span>
		                  	@endif

		                  </div>

		            	</div>

		               <div class="col-md-10 col-xs-12">

		                  <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">

		                     <label for="manager_name">Nome</label>
		                     <input type="text" id="manager_name" name="manager_name" class="form-control uppercase" placeholder="Nome" value="{{ old( 'manager_name', $settings->manager_name ?? "" ) }}" />

		                     @if ($errors->has('manager_name'))
		                  	    <span class="help-block">
		                  	        <strong>{{ $errors->first('manager_name') }}</strong>
		                  	    </span>
		                  	@endif

		                  </div>

		               </div>

		            </div>

		            <div class="row">
		            	
						<div class="col-md-10 col-xs-12">

  		                    <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">

								<label for="manager_occupation">Cargo</label>
								<input type="text" id="manager_occupation" name="manager_occupation" class="form-control uppercase" placeholder="Cargo" value="{{ old( 'manager_occupation', $settings->manager_occupation ?? "" ) }}" />

  		                      	@if ($errors->has('manager_occupation'))
		                  	    	<span class="help-block">
		                  	        	<strong>{{ $errors->first('manager_occupation') }}</strong>
		                  	    	</span>
		                  		@endif

							</div>
							
						</div>

						<div class="col-md-2 col-xs-12">

							  <div class="form-group{{ $errors->has('manager_email') ? ' has-error' : '' }}">

							     <label for="manager_email">E-mail</label>

							     <div class="input-group">
							     	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							     	<input type="text" id="manager_email" name="manager_email" class="form-control" placeholder="E-mail da instituição" value="{{ old( 'manager_email', $settings->manager_email ?? "" ) }}" />
							     </div>

							    @if ($errors->has('manager_email'))
									<span class="help-block">
									    <strong>{{ $errors->first('manager_email') }}</strong>
									</span>
								@endif 

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
		            <h3 class="box-title">Secretaria</h3>
		         </div>

		         <div class="box-body">

		            <div class="row">

		               <div class="col-md-12">

		                  <div class="form-group">
		                     <label for="secretary_name">Nome</label>
		                     <input type="text" id="secretary_name" name="secretary_name" class="form-control uppercase" placeholder="Nome" value="{{ old( 'secretary_name', $settings->secretary_name ?? "" ) }}" />
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
		            <h3 class="box-title">Boleto bancário</h3>
		         </div>

		         <div class="box-body">

		            <div class="row">

						<div class="col-md-4 col-xs-12">

							<div class="form-group{{ $errors->has('bankslip_value') ? ' has-error' : '' }}">

								<label for="bankslip_value">Valor</label>
							 	<input type="text" id="bankslip_value" name="bankslip_value" class="form-control currency" value="{{ old( 'bankslip_value', $settings->bankslip_value ?? "" ) }}" />

								@if ($errors->has('bankslip_value'))
									<span class="help-block">
									    <strong>{{ $errors->first('bankslip_value') }}</strong>
									</span>
								@endif 

							</div>

						</div>

						<div class="col-md-4 col-xs-12">

							<div class="form-group{{ $errors->has('bankslip_fine') ? ' has-error' : '' }}">

								<label for="bankslip_fine">Multa</label>
							 	<input type="text" id="bankslip_fine" name="bankslip_fine" class="form-control currency" value="{{ old( 'bankslip_fine', $settings->bankslip_fine ?? "" ) }}" />

								@if ($errors->has('bankslip_fine'))
									<span class="help-block">
									    <strong>{{ $errors->first('bankslip_fine') }}</strong>
									</span>
								@endif 

							</div>

						</div>

						<div class="col-md-4 col-xs-12">

							<div class="form-group{{ $errors->has('bankslip_interest') ? ' has-error' : '' }}">

								<label for="bankslip_interest">Juros</label>
							 	<input type="text" id="bankslip_interest" name="bankslip_interest" class="form-control currency" value="{{ old( 'bankslip_interest', $settings->bankslip_interest ?? "" ) }}" />

								@if ($errors->has('bankslip_interest'))
									<span class="help-block">
									    <strong>{{ $errors->first('bankslip_interest') }}</strong>
									</span>
								@endif 

							</div>

						</div>

		            </div>

		            <div class="row">

						<div class="col-md-12">

							<div class="form-group{{ $errors->has('bankslip_paymentplace') ? ' has-error' : '' }}">

								<label for="bankslip_paymentplace">Local de pagamento</label>
							 	<input type="text" id="bankslip_paymentplace" name="bankslip_paymentplace" class="form-control uppercase" placeholder="Local de pagamento" value="{{ old( 'bankslip_paymentplace', $settings->bankslip_paymentplace ?? "" ) }}" />

								@if ($errors->has('bankslip_paymentplace'))
									<span class="help-block">
									    <strong>{{ $errors->first('bankslip_paymentplace') }}</strong>
									</span>
								@endif 

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-12">
							<label for="bankslip_observations">Observações</label>
							<textarea id="bankslip_observations" name="bankslip_observations" class="form-control" rows="5" placeholder="Observações">{{ old( 'bankslip_observations', $settings->bankslip_observations ?? "" ) }}</textarea>
						</div>
						
					</div>

		         </div>
		         <!-- /.box -->

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

	<script src="/js/utils.js"></script>

	<script>

		$("[data-mask]").inputmask();

		$(".currency").maskMoney( { prefix: "R$ ", affixesStay: true, thousands: '.', decimal: ',', allowZero: true } );

		$(document).ready( function(){

			formatDecimal("bankslip_value");
			formatDecimal("bankslip_fine");
			formatDecimal("bankslip_interest");

		});

		$("#settings-form").submit(function(){

			unformatDecimal("bankslip_value");
			unformatDecimal("bankslip_fine");
			unformatDecimal("bankslip_interest");

		});

	</script>

@endsection
