<?php

use Controller\RentasController;
use Controller\VehiculoController;

$renta = new RentasController();

$registro = $renta->editar();
$renta->actualizar();
$vehiculo = new VehiculoController();
?>

<form method="POST">


    <div class="form-group">
        <div class="row mb-3">
            <div class="col-2"><label>Nombre</label>
            </div>
            <h3><?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos'] ?></h3>

        </div>

    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-2"><label>Ultima Renta</label>
            </div>
            <div class="col-10"><input type="text" name="vehiculos" class="form-control" value="<?php echo $registro['vehiculos']; ?>" readonly></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row mb-3">
            <div class="col-2"><label>Nuevo Vehiculo</label>
            </div>
            <div class="col-10">
                <select name="idvehiculo">
                    <?php

                    foreach ($vehiculo->mostrar() as $row => $item) { {
                            $item['id'];
                        }
                        echo  "<option value='{$item['id']}'>{$item['vehiculos']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>


    <input type="hidden" name="idRegistro" value="<?php echo $registro['idregistro']; ?>">

    <div class="form-group">
        <div class="row mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>

</form>