<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Es la configuracion de dotenv le estamos diciendo al archivo .env que en la carpeta anterior se encuentra el archivo php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');

// Lee el archivo .env para usar las variables de entorno 
$dotenv->load();

// Crear la clase conexion 
class Conexion
{
    public function conectar()
    {
        $usuario = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $host = $_ENV['DB_HOST'];
        $bd = $_ENV['DB_NAME'];

        $conexion = new PDO(
            "mysql:host=$host;dbname=$bd;charset=utf8mb4",
            $usuario,
            $password,
            [
                //Configurar manejo de errores
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                //configurar obtencion de registros 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                //controlar si PDO simula consultas preparadas
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );

        return $conexion;
    }
}