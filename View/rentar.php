<?php
use Controller\RentasController;
use Controller\VehiculoController;
$auto= new VehiculoController();
$registrar = new RentasController();
if(!empty($_SESSION['id']) && !empty($_SESSION['rol']== '1') ) {

?>

<h1>Renta tu Vehiculo</h1>

<div class="container">

    <form method="POST">
       
    <div class="alert alert-light" role="alert">
        <h1><?php echo $_SESSION['nombres'] ."  " .$_SESSION['apellidos'];   ?></h1>
    </div>

       
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Vehiculos</label>
                </div>
                <div class="col-10">
                <select class="form-select" name="idvehiculo">
                        <?php
                        
                        foreach($auto->mostrar() as $row => $item){
                            {$item['id'];}
                            echo  "<option value='{$item['id']}'>{$item['vehiculos']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="row mt-3">
                <button class="btn btn-primary">Confirmar</button>
            </div>
        </div>
        
    </form>
     
<?php 

$resultado=$registrar->rentar();

if($resultado == "guardado"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Vehiculo Rentado</div>";
}
elseif($resultado =="error"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    error</div>";
}
}
?>
</div>