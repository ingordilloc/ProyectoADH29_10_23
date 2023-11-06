<?php

use Controller\RentasController;
use Controller\TipoController;

$tipo = new TipoController();
$registrar = new RentasController();
if (!empty($_SESSION['id']) && !empty($_SESSION['rol'] == '1')) {

?>

    <h1 class="text-light">Renta por Tipo de Vehiculos</h1>

    <div class="container">

        <form method="POST">

            <div class="alert alert-light" role="alert">
                <h1><?php echo $_SESSION['nombres'] . "  " . $_SESSION['apellidos'];   ?></h1>
            </div>


            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2 text-light"><label>Clase de Vehiculo</label>
                    </div>
                    <div class="col-10">
                        <select class="form-select" name="idclase">
                            <?php

                            foreach ($tipo->mostrar() as $row => $item) { {
                                    $item['id'];
                                }
                                echo  "<option value='{$item['id']}'>{$item['clase']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row mt-3">
                    <button type="submit" class="btn btn-primary m-3">Siguiente</button>
                </div>
            </div>

        </form>

    <?php
    $registrar->rentar();
    echo "
<form method='post'> 

<div class='form-group'>
<div class='row mb-3'>
    <div class='col-2 text-light'><label>Vehiculos</label>
    </div>
    <div class='col-10'>
    <select class='form-select' name='idvehiculo'>
           ";

    foreach ($tipo->mostrarVehiculos() as $row => $item) { 

        echo  "<option value='{$item['id']}'>{$item['vehiculos']}</option>";
    }
    echo " 
        </select>
    </div>
</div>
</div>
<div class='form-group´>
<div class='row mt-3>
<button type='submit' class='btn btn-primary'>Rentar</button>
</div>
</div>
</form> 
";
}
    ?>
    </div>