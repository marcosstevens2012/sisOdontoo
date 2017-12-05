<?php
class TOdontograma
{
	private $codigoOdontograma;
	private $codigoPaciente;
	private $estados;
	private $descripcion;
	private $fechaRegistro;

	public function __construct(){}

	public function setCodigoOdontograma($codigoOdontograma)
	{
		$this->codigoOdontograma=$codigoOdontograma;
	}

	public function getCodigoOdontograma()
	{
		return $this->codigoOdontograma;
	}

	public function setCodigoPaciente($codigoPaciente)
	{
		$this->codigoPaciente=$codigoPaciente;
	}

	public function getCodigoPaciente()
	{
		return $this->codigoPaciente;
	}

	public function setEstados($estados)
	{
		$this->estados=$estados;
	}

	public function getEstados()
	{
		return $this->estados;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion=$descripcion;
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setFechaRegistro($fechaRegistro)
	{
		$this->fechaRegistro=$fechaRegistro;
	}
	
	public function getFechaRegistro()
	{
		return $this->fechaRegistro;
	}
}
?>