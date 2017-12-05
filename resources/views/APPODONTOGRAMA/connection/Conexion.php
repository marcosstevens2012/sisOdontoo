<?php
class Conexion
{
	private $conexion;
	private $server;
	private $user;
	private $password;
	private $dataBase;

	public function __construct()
	{
		$this->server="localhost";
		$this->user="root";
		$this->password="";
		$this->dataBase="sgo";

		try
		{
			$this->conexion=new PDO('mysql:host='.$this->server.';dbname='.$this->dataBase, $this->user, $this->password);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function getConexion()
	{
		return $this->conexion;
	}
}
?>