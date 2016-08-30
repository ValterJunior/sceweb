{!! Form::open( [ 'method' => 'DELETE', 'action' => [$deleteMethod, 0], 'id' => 'form_' . $button_class ] ) !!}

   <input type="hidden" name="id" />

	<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeLabel">

	  <div class="modal-dialog" role="document">

	    <div class="modal-content">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="removeLabel">Excluir {{ ucfirst($entity[1]) }}</h4>
	      </div>

	      <div class="modal-body">
	        <p>Deseja realmente excluir {{ $entity[0] }} <strong>{{ $entity[1] }}</strong>?</p>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Fechar</button>
	        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
	      </div>

	    </div>

	  </div>

	</div>

{!! Form::close() !!}

<script>

   $(document).on("click", ".{{ $button_class }}", function () {

        var id = $(this).data('value');

        if( id ){
           $("#{{ 'form_' . $button_class }}").attr("action", "{{ action( $deleteMethod, ['id' => ''] ) }}/" + id );
        }

   });

   // $("#{{ 'form_' . $button_class }}").submit( function(){
   //
   //    var id = $(".{{ $button_class }}").attr("data-value");
   //    alert(id);
   //    if( id ){
   //       $(this).attr("action", "{{ action( $deleteMethod, ['id' => ''] ) }}/" + id );
   //    }
   //
   // });

</script>
