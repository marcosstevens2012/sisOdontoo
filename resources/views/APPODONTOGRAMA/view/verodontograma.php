<?php
require("../controller/ControladorOdontograma.php");
$controladorOdontograma=new ControladorOdontograma();
$arrayTOdontograma=$controladorOdontograma->consultarTodoPorCodigoPaciente($_POST["codigoPaciente"]);
?>
<table class="table">
	<thead>
		<th>DESCRIPCIÓN</th>
		<th class="widthDetalleTable">FECHA REGISTRO</th>
		<th class="widthDetalleTable"></th>
	</thead>
	<tbody style="font-size: 13px;">
		<?php
		foreach($arrayTOdontograma as $key => $value) 
		{
			?>
			<tr>
				<td><?=$value->getDescripcion()?></td>
				<td><?=$value->getFechaRegistro()?></td>
				<td><input id="<?=$value->getEstados()?>" type="button" class="button2" value="Ver Detalle" onclick="cargarDientes('seccionDientes', 'dientes.php', this.id);"></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>