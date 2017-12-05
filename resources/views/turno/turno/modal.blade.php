

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$tur->idturno}}">
	{{Form::Open(array('action'=>array('TurnoController@destroy',$tur->idturno),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Editar estado</h4>
			</div>

			<div class="modal-body">
				<p>Confirme si desea Modificar Turno</p>
			</div>

			<label>Estado</label>
				<select name="idestado" id="idestado" class="form-control selectpicker" data-live-search="true">
					<option value="{{$tur->estado}}">{{$tur->estado}}</option>
					<option value="3">Finalizado</option>
					<option value="1">Activo</option>
				</select>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

	
</div>