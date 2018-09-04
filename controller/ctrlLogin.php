<?php 
include("../model/login.php");
$request_method=$_SERVER["REQUEST_METHOD"];
class CtrlLogin{
    function login(){
        global $request_method;
        switch($request_method){
            case 'POST':
                $data = call_user_func_array(array("Login", 'login_usuario'), array($_POST["email"],$_POST["password"]));
                return $data;
                break;
            default:
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }
}


?>