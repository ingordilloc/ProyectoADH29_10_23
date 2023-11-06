<?php

namespace Controller;

use Model\RentasModel;

class RentasController
{
    public function rentar()
    {
        if (!empty($_POST['idvehiculo'])){
            $datos = array(
                "idvehiculo" => $_POST['idvehiculo'],
                "fecha" => date("y/m/d")
                
            );
            $respuesta = RentasModel::guardarRegistro($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public static function mostrar()
    { 
        $mostrar = RentasModel::mostrarRegistros();
        return $mostrar;
    
    }
    public static function mostrarOtros()
    { 
          $idrole=$_SESSION['id'];
        $mostrarID = RentasModel::mostrarRegistroOtros($idrole);
        return $mostrarID;
    
    }

    public function editar()
    {  
        $idRegistro = $_GET['idRegistro']; 
        $registrar = RentasModel::editarRenta($idRegistro);
        return $registrar;
    }

    public function actualizar()
    {  
        if (!empty($_POST['idRegistro']) && !empty($_POST['idvehiculo'])) {
            $datos = array(
                "idregistro" => $_POST['idRegistro'],
                "idvehiculo" => $_POST['idvehiculo'],
                "idusuario" => $_SESSION['id']
            );
            $respuesta = RentasModel::actualizarRenta($datos);

            if($respuesta){
                header("Location: index.php?action=mostrar");
            }


        }
    }

    public function borrar(){
        if (!empty($_GET['idRegistro'])){
            $registro = RentasModel::borrarRegistro($_GET['idRegistro']);
            return $registro;
        }
    }

    public function confirmarBorrar(){
        if(!empty($_POST['idRegistro'])){
            $inscripcion = RentasModel::borrarConfirmadoRegistro($_POST['idRegistro']);
            if($inscripcion){ header("Location: index.php?action=mostrar"); }
        }
    }








}
