<?php
namespace Model;

class EnlacesModel{
    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio"=> "View/inicio.php",
            "contacto"=> "View/contacto.php",
            "nosotros"=> "View/nosotros.php",
            "registros"=> "View/rentar.php",
            "mostrar"=> "View/mostrarRentas.php",
            "editarRenta"=> "View/editarRenta.php",
            "eliminarRenta"=> "View/eliminarRegistro.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            "registroTipo" => "View/rentartipo.php",
            "crearUsuarioNuevo" => "View/nuevoUsuario.php",
            default => "View/error.php"
        };
        return $modulo;
    }
        
    }
//Pagina en blanco con las paginas que funcionan

?>