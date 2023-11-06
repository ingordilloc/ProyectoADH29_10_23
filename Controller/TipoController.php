<?php

namespace Controller;

use Model\TipoModel;

class TipoController
{
    

    public function mostrar()
    {
        $registro = TipoModel::mostrarClase();
        return $registro;
    }

    public function mostrarVehiculos(){
        if (!empty($_POST['idclase'])){
            $rentas = TipoModel::mostrarClaseVehiculos($_POST['idclase']);
            return $rentas;
        }
    }



}
?>