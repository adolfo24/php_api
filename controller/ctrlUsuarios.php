<?php 
include("../model/usuarios.php");
$request_method=$_SERVER["REQUEST_METHOD"];
class CtrlUsuario{
    function usuarios(){
        global $request_method;
        switch($request_method){
            case 'GET':
                $data = call_user_func(array("Usuario", 'get_usuarios'));
                return $data;
                break;
            case 'POST':
                $data = call_user_func_array(array("Usuario", 'add_usuario'), array($_POST["nombres"],$_POST["apellidos"],$_POST["email"],$_POST["password"]));
                return $data;
                break;
            default:
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }
}


?>