<!doctype html>
<html lang="sp">
<head>
	<meta charset="UTF-8">
	<title>REGISTRAR ODONTOGRAMA</title>
</head>
<body>
	<?php
	require("../controller/ControladorOdontograma.php");
	$controladorOdontograma=new ControladorOdontograma();
	if($controladorOdontograma->registrar())
	{
		echo "<div class='alertaCorrecto'>Los datos fueron registrados satisfactoriamente</div>";
	}
	else
	{
		echo "<div class='alertaIncorrecto'>Error al tratar de registrar datos. Contacte al administrador del sistema.</div>";
	}
	?>
</body>
</html>