<?php
class ModeloTOdontograma
{
	public function registrar($conexion, $tOdontograma)
	{
		$query="insert into TOdontograma(codigoOdontograma, codigoPaciente, estados, descripcion) values(?, ?, ?, ?)";
		$sql=$conexion->prepare($query);
		$parametros=array
		(
		  	$tOdontograma->getCodigoOdontograma(),
			$tOdontograma->getCodigoPaciente(),
			$tOdontograma->getEstados(),
			$tOdontograma->getDescripcion()
		);
		$sql->execute($parametros);

		return true;
	}

	public function consultarTodoPorCodigoPaciente($conexion, $codigoPaciente)
	{
		$query="select * from TOdontograma where codigoPaciente='".$codigoPaciente."'";
		$sql=$conexion->prepare($query);
		/*$parametros=array
		(
			$codigoPaciente
		);*/
		$sql->execute();
		$resultados=$sql->fetchAll();

		$arrayTOdontograma=[];

    	foreach($resultados as $row) 
    	{
    		$tOdontograma=new TOdontograma();
	        $tOdontograma->setCodigoOdontograma($row["codigoOdontograma"]);
			$tOdontograma->setCodigoPaciente($row["codigoPaciente"]);
			$tOdontograma->setEstados($row["estados"]);
			$tOdontograma->setDescripcion($row["descripcion"]);
			$tOdontograma->setFechaRegistro($row["fechaRegistro"]);

			$arrayTOdontograma[]=$tOdontograma;
    	}

    	return $arrayTOdontograma;
	}

	public function consultarUltimo($conexion, $codigoPaciente)
	{
		$query="select * from TOdontograma where codigoPaciente='".$codigoPaciente."' order by codigoOdontograma desc limit 1";
		$sql=$conexion->prepare($query);
		/*$parametros=array
		(
			$codigoPaciente
		);*/
		$sql->execute();
		$resultados=$sql->fetchAll();

		$arrayTOdontograma=[];

    	foreach($resultados as $row) 
    	{
    		$tOdontograma=new TOdontograma();
	        $tOdontograma->setCodigoOdontograma($row["codigoOdontograma"]);
			$tOdontograma->setCodigoPaciente($row["codigoPaciente"]);
			$tOdontograma->setEstados($row["estados"]);
			$tOdontograma->setDescripcion($row["descripcion"]);
			$tOdontograma->setFechaRegistro($row["fechaRegistro"]);

			$arrayTOdontograma[]=$tOdontograma;
    	}

    	return $arrayTOdontograma;
	}
}
?>