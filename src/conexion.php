<?php
// Los datos de conexión llegan como variables de entorno
// (en local las define docker-compose.yml; en Render, su panel).
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASSWORD');

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

//========= OJO SSL 

// Si existe DB_SSL_CA (en Render), la conexión va cifrada y se verifica
// el certificado del servidor. En local (docker-compose) no existe y se conecta sin SSL.
$options = [];
if (getenv('DB_SSL_CA')) {
    $options[PDO::MYSQL_ATTR_SSL_CA] = getenv('DB_SSL_CA');
}

//===

try {
    $conn = new PDO($dsn, $user, $pass, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('❌ Error de conexión: ' . $e->getMessage());
}


/* EN LUGAR DE
$username = 'root';
$password = 'example';

$dsn = 'mysql:host=db;dbname=miapp;charset=utf8mb4';

Una OPCIón para SSL y...

try {
    $conn= new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('❌ Error de conexión: ' . $e->getMessage());
}

Esto serúia la base
*/