<?php
session_start();

require './clases/Conexion.php';
require './vendor/autoload.php';

$CLIENT_ID = $_ENV['GOOGLE_CLIENTE_ID'];
$client = new Google_Client(['client_id' => $CLIENT_ID]);

$token = $_POST['credential'] ?? null;

if (!$token) {
    header('Location: login.php');
    exit;
}

$payload = $client->verifyIdToken($token);

if ($payload) {

    //obtener credenciales
    $correo = $payload['email'];
    $nombre = $payload['name'];

    //preparar la conexion 
    $bd = new Conexion();
    $conn = $bd->conectar();

    //preparar y ejecutar la consulta
    $sql_login = 'CALL buscar_usuario(:correo)';
    $stmt = $conn->prepare($sql_login);
    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->execute();

    //obtener el resultado de la consulta
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $mensaje = "";
    $idUsuario = null;

    if ($user) {
        if ($user['estado'] == 0) {
            echo "";
            exit;
        }
        $mensaje = 'Usuario inicio sesion correctamente';

        $idUsuario = $user['id'];
        $rol = $user['rol'];

    } else {
        $token_usuario = bin2hex(random_bytes((32)));

        $sql_insertarUsuarioLogin = 'CALL insertar_usuario(:correo, :token_usuario)';
        $stmt_InsertarUsuarioLogin = $conn->prepare($sql_insertarUsuarioLogin);
        $stmt_InsertarUsuarioLogin->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt_InsertarUsuarioLogin->bindParam(':token_usuario', $token_usuario, PDO::PARAM_STR);
        $stmt_InsertarUsuarioLogin->execute();

        $resultado = $stmt_InsertarUsuarioLogin->fetch(PDO::FETCH_ASSOC);
        $stmt_InsertarUsuarioLogin->closeCursor();

        $mensaje = 'Usuario registrado correctamente e inicio de sesion correcto';

        $idUsuario = $resultado['nuevo_id'];
    }

    $sql_InsertarLogLogin = 'CALL insertar_log(:mensaje, :fk_usuario)';
    $sql_InsertarLogLogin = $conn->prepare($sql_InsertarLogLogin);
    $sql_InsertarLogLogin->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
    $sql_InsertarLogLogin->bindParam(':fk_usuario', $idUsuario, PDO::PARAM_INT);
    $sql_InsertarLogLogin->execute();

    $_SESSION['correo'] = $correo;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['rol'] = $rol ?? 1;

    header('Location: index.php');
    exit;
} else {
    echo "";
    exit;
}