<?php
include_once '../config/conexiondb.php';
$db = new dbObj();
$mysqli =  $db->get_conexion();
class Login {
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

}