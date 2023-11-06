<?php
namespace Model;

use Model\ConexionModel;


class VehiculoModel{
    public static function mostrarVehiculo(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM vehiculos");
        $stmt->execute();
        return $stmt->fetchAll();

    }


}

?>