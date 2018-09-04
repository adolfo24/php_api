<?php
include_once '../config/conexiondb.php';
$db = new dbObj();
$mysqli =  $db->get_conexion();
class Usuario {
    function get_usuarios(){
        global $mysqli;
        $response=array();
        if ($stmt = $mysqli->prepare("SELECT nombres, email, apellidos FROM usuarios")) {
            $stmt->execute();
            $stmt->bind_result($nombres,$email,$apellidos);
            $result =  $stmt->get_result();
            while ($row = $result->fetch_assoc())
            {
                $response[]=$row;
            }          		
            $stmt->close();
        }
        $mysqli->close();
        return json_encode($response);
    }
    function login_usuario($email,$password){
        global $mysqli; 
        if ($stmt = $mysqli->prepare("SELECT nombres, email, apellidos FROM usuarios WHERE email= ? AND password=? LIMIT 1")) {
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->bind_result($nombres,$email,$apellidos);
            $result =  $stmt->get_result();
            $response=$result->fetch_assoc();
            $stmt->close();
        }
        $mysqli->close();
        if($response==null){
            $response=array('success' => false,'message' =>'Usuario o Contraseña no validos.');
            return json_encode($response);
        }else{
            $response=array('success' => true,'message' =>'Acceso exitoso.','nombres'=>$response["nombres"],'apellidos'=>$response["apellidos"],'email'=>$response["email"]);
            return json_encode($response);
        }
        
    }
    function add_usuario($nombres,$apellidos, $email,$password){
        global $mysqli; 
        if($stmt = $mysqli->prepare("INSERT INTO usuarios (nombres,  apellidos, email, password ) VALUES(?, ?, ?, ?)")){
            $stmt->bind_param("ssss",$nombres,$apellidos, $email, $password);
            $stmt->execute();
            $response=array('success' => true,'message' =>'Registrado Exitosamente');
            $stmt->close();   
            return json_encode($response);
        }else{
            $response=array('success' => false,'message' =>'Error al registrar');
            return json_encode($response);
        }        
        $mysqli->close();
    }
    
}