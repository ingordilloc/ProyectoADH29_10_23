<?php

namespace Controller;

use Model\UsuarioModel;

class UsuarioController{

    public function login(){
        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty ($token) && !empty ($_POST['usuario']) && !empty ($_POST['password'])){
            $usuario = strClean($_POST['usuario']);
        $password = strClean($_POST['password']);
            $datos = array(
                'usuario' => $usuario
            );
            $respuesta = UsuarioModel::login($datos);
            $resultado = password_verify($password, $respuesta['password']);

            if ($resultado == true){//hubo coincidencia
                $_SESSION['usuario']= $respuesta['usuario'];
                $_SESSION['nombres']= $respuesta['nombres'];
                $_SESSION['apellidos']= $respuesta['apellidos']; 
                $_SESSION['id']= $respuesta['id'];
                $_SESSION['password']= $respuesta['password'];
                $_SESSION['rol']= $respuesta['rol'];
                header("location: index.php?action=inicio&id={$respuesta['id']}");

            }else {
                //mensaje error
                return "ERROR";
            }
        }
    }

    public function logout(){
        session_destroy();
        //session_unset() otras opciones a utilizar
        header("location: index.php?action=inicio");
    }

    public function crearUsuarioEstudiante(){
        if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty ($_POST['nombres'])){
            
            $usuario =strClean($_POST['usuario']);
            $password = strClean($_POST['password']);
            $password = password_hash($password , PASSWORD_ARGON2ID);//contraseña cifrada
            $nombres = strClean($_POST['nombres']);
            $apellidos = strClean($_POST['apellidos']);

            $datos=array(
                'usuario'=> $usuario,
                'password'=> $password,
                'nombres'=> $nombres,
                'apellidos'=> $apellidos,
                'rol'=> '1',
            );
            
            $respuesta = UsuarioModel::guardarUsuarioEstudiante($datos);
            return $respuesta;
        }
    }

}
?>