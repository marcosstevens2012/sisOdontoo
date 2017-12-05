<?php
require("../connection/Conexion.php");
require("../entity/TOdontograma.php");
require("../model/ModeloTOdontograma.php");

class ControladorOdontograma
{
	private $conexion;

	public function __construct()
	{
		$conexion=new Conexion();
		$this->conexion=$conexion->getConexion();
	}

	public function registrar()
	{
		$modeloTOdontograma=new ModeloTOdontograma();
		$arrayTOdontograma=$modeloTOdontograma->consultarUltimo($this->conexion, $_POST["codigoPaciente"]);
		$estadosAnteriores=count($arrayTOdontograma)==0?"":$arrayTOdontograma[0]->getEstados();
		if($estadosAnteriores!="")
		{
			$estadosAnteriores="__".$estadosAnteriores;
		}

		try
		{
			$tOdontograma=new TOdontograma();
			$tOdontograma->setCodigoOdontograma("CODIGOXX0000000");
			$tOdontograma->setCodigoPaciente($_POST["codigoPaciente"]);
			$tOdontograma->setEstados($_POST["estados"].$estadosAnteriores);
			$tOdontograma->setDescripcion($_POST["descripcion"]);
			$tOdontograma->setFechaRegistro(null);

			$modeloTOdontograma->registrar($this->conexion, $tOdontograma);

			return true;
		}
		catch(Exception $ex)
		{
			return false;
		}
	}

	public function consultarUltimoTOdontograma($codigoPaciente)
	{
		try
		{
			$modeloTOdontograma=new ModeloTOdontograma();
			$arrayTOdontograma=$modeloTOdontograma->consultarUltimo($this->conexion, $codigoPaciente);
			return $arrayTOdontograma;
		}
		catch(Exception $ex)
		{
			return null;
		}
	}

	public function consultarTodoPorCodigoPaciente($codigoPaciente)
	{
		try
		{
			$modeloTOdontograma=new ModeloTOdontograma();
			$arrayTOdontograma=$modeloTOdontograma->consultarTodoPorCodigoPaciente($this->conexion, $codigoPaciente);
			return $arrayTOdontograma;
		}
		catch(Exception $ex)
		{
			return null;
		}
	}
}
?>