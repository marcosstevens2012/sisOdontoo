<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$aud->idaudit}}">
	{{Form::Open(array('action'=>array('AuditoriaController@destroy',$aud->idaudit),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
		</div>
	</div>
	{{Form::Close()}}
</div>