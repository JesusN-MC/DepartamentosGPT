<?php
// Incluir el archivo de conexion una sola vez
require_once '../clases/Conexion.php';

// Verificar qie el correo realmente exista 
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    //Preparar la conexion
    $bd = new Conexion();
    $conn = $bd->conectar();

    $sql_CerrarSesion = "CALL buscar_usuario(:correo)";
    $stmt_CerrarSesion = $conn->prepare($sql_CerrarSesion);
    $stmt_CerrarSesion->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt_CerrarSesion->execute();

    $user = $stmt_CerrarSesion->fetch(PDO::FETCH_ASSOC);
    $stmt_CerrarSesion->closeCursor();

    if ($user) {
        $sql_CerrarSesion_InsertarLog = "CALL insertar_log(:mensaje, :fk_usuario)";
        $stmt_CerrarSesion_InsertarLog = $conn->prepare($sql_CerrarSesion_InsertarLog);
        $mensaje = "El usuario cerro sesion correctamente";
        $stmt_CerrarSesion_InsertarLog->bindParam(':mensaje',$mensaje, PDO::PARAM_STR);
        $stmt_CerrarSesion_InsertarLog->bindParam(':fk_usuario', $user['pk_usuario'], PDO::PARAM_INT);
        $stmt_CerrarSesion->execute();
    }
}

session_unset();
session_destroy();

header("Location: ../pages/login.php");
exit;