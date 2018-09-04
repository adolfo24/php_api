<?php
include("../controller/ctrlLogin.php");
header('Content-Type: application/json');
echo call_user_func(array("CtrlLogin", 'login'));