<?php
include("../controller/ctrlUsuarios.php");
header('Content-Type: application/json');
echo call_user_func(array("CtrlUsuario", 'usuarios'));