<?php

require "./vendor/autoload.php";
use Ejercicios1\Main;



$main= new Main();
$main->run();
$tipos= $main->tipoTransaccion;

$tipoTransaccionElegida='opcion elegida. Tipo de transferencia';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Datos de la transferencia</h1>
	<form action="main.php">
		<div>
			<select name="tipoTransaccion_select"><?php foreach($tipos as $tipo){?>
				<option value="<?$tipo;?>"><?php echo $tipo?></option>
				<?}?>
			</select>

			<button type="submit">ENVIAR</button>
		</div>
	</form>
</body>	
</html>