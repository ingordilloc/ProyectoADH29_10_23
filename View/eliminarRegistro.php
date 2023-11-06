<?php
use Controller\RentasController;

$renta = new RentasController();
$registro = $renta->borrar();
$renta->confirmarBorrar();

?>

<form method="post">
<?php echo $_SESSION['nombres']. " ". $_SESSION['apellidos'];?>
<br>
<?php echo $registro['vehiculos'];?>
<h2>¿Seguro que desea anular alquiler de vehiculo?</h2>
<input type="hidden" name="idRegistro" value ="<?php echo $registro['idregistro'];?>">
<button type="submit" class="btn btn-primary">Borrar</button>


</form>