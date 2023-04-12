<?php 

if (!isset($_GET['codigo'])) {
    header('location: index.php?mensaje=error');
    exit();
}
require 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare(" DELETE FROM personas where codigo = ?; ");
$resultado = $sentencia->execute([$codigo]);

if ($resultado === TRUE) {
    header('location: index.php?mensaje=eliminado');
} else {
    header('location: index.php?mensaje=error');
}


?>
