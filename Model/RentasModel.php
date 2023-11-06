<?php
namespace Model;

use Model\ConexionModel;


class RentasModel{
    public static function guardarRegistro($datos){
          try {  
        $stmt = ConexionModel::conectar()->prepare("INSERT INTO registros (fecha, fkUsuario, fkVehiculos) VALUES (:fecha, :usuario, :vehiculos) ");                                                                                            
        $stmt->bindParam(":vehiculos", $datos['idvehiculo'], \PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $_SESSION['id'], \PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos['fecha'], \PDO::PARAM_STR);
        return $stmt->execute() ? true: false;//Ejecucion de la consulta.
    }catch( \Throwable $th ){
        return false;
    }
    
    }
    

    public static function mostrarRegistros(){
        $stmt = ConexionModel::conectar()->prepare("SELECT registros.id as idregistros, vehiculos, usuario.nombres as nombre, fecha, tipo.clase as tipo FROM registros INNER JOIN vehiculos on vehiculos.id=fkVehiculos INNER JOIN tipo on tipo.id=vehiculos.fkTipo INNER JOIN usuario on usuario.id = fkUsuario");
        $stmt->execute();
        return $stmt->fetchAll();

    }
    public static function mostrarRegistroOtros($idrole){
        $stmt = ConexionModel::conectar()->prepare("SELECT registros.id as idregistros, vehiculos, usuario.nombres as nombre, fecha, tipo.clase as tipo FROM registros INNER JOIN vehiculos on vehiculos.id=fkVehiculos INNER JOIN tipo on tipo.id=vehiculos.fkTipo INNER JOIN usuario on usuario.id = fkUsuario where usuario.id = :id ");
        $stmt->bindParam(':id',$idrole,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    public static function editarRenta($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT vehiculos, registros.id as idregistro FROM registros INNER JOIN vehiculos on fkVehiculos=vehiculos.id where registros.id =:id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    public static function actualizarRenta($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE registros SET fkVehiculos = :vehiculo WHERE  registros.id = :id ");
        $stmt->bindParam(':vehiculo',$datos['idvehiculo'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idregistro'],\PDO::PARAM_INT);

        return $stmt->execute() ? true : false;

    }

    public static function borrarRegistro($idRegistro){
        $stmt = ConexionModel::conectar()->prepare("SELECT registros.id as idregistro, vehiculos FROM registros INNER JOIN vehiculos on fkVehiculos = vehiculos.id WHERE  registros.id = :id ");
        $stmt->bindParam(':id',$idRegistro,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();


    }
public static function borrarConfirmadoRegistro($id){
    if(!empty($_POST['idRegistro'])){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM registros WHERE id =:id");
        $stmt->bindParam(':id', $id,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;

    }
 }

}

?>