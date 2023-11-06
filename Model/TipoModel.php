<?php
namespace Model;

use Model\ConexionModel;


class TipoModel{
    
    

    public static function mostrarClase(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM tipo");
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public static function mostrarClaseVehiculos($idclase){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM vehiculos where fkTipo = :id");
        $stmt->bindParam(':id', $idclase,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}

?>