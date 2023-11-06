<?php

namespace Controller;

use Model\VehiculoModel;

class VehiculoController
{
    public  function mostrar()
    {
        $auto = VehiculoModel::mostrarVehiculo();
        
        return $auto;
    }




}
?>