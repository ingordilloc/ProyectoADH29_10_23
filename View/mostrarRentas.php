<?php
use Controller\RentasController;

if(!empty($_SESSION['id']) && ($_SESSION['rol']=='a')) { 
    echo "<h4>Administrador > Listado de Rentas Realizadas</h4>";  
$rentas = new RentasController;
$listado = $rentas->mostrar();

foreach ($listado as $row  =>  $item) {
    
    
    echo "
    <div class='row'>
         <div class='col text-light'>{$item['idregistros']}</div>
         <div class='col text-light'>{$item['nombre']}</div>
         <div class='col text-light'>{$item['vehiculos']}</div>
         <div class='col'>{$item['fecha']}</div>
         <div class='col'>{$item['tipo']}</div>
         <div class='col'><a href='index.php?action=editarRenta&idRegistro={$item['idregistros']}'>Editar</a></div>
         <div class='col'><a href='index.php?action=eliminarRenta&idRegistro={$item['idregistros']}'>Eliminar</a></div>
         
    </div>
    ";
}

} elseif(!empty($_SESSION['id']) || ($_SESSION['rol']=='1')){
    echo "<h4 class='text-light'>Rentas Realizadas</h4>";
    $registros = new RentasController;
$listado = $registros->mostrarOtros();

foreach ($listado as $row  =>  $item) {
    
    
    echo "
    <div class='row'>
         <div class='col text-light'>{$item['idregistros']}</div>
         <div class='col text-light'>{$item['nombre']}</div>
         <div class='col text-light'>{$item['vehiculos']}</div>
         <div class='col text-light'>{$item['fecha']}</div>
         <div class='col text-light'>{$item['tipo']}</div>
         <div class='col'><a class='text-light' href='index.php?action=editarRenta&idRegistro={$item['idregistros']}'>Editar</a></div>
         <div class='col'><a class='text-light' href='index.php?action=eliminarRenta&idRegistro={$item['idregistros']}'>Eliminar</a></div>
         
    </div>
    ";
}
}

?>