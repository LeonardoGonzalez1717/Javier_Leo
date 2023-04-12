<?php 
//Validacion para commprabar de entrar paso por paso y no ir directo a "editarcodigo.php"
print_r($_POST);
if (!isset($_POST['codigo'])) {
    header('location: index.php?mensaje=error');
}
require 'model/conexion.php';

$codigo = ($_POST['codigo']);
$nombre = ($_POST['txtNombre']);
$nota1 = ($_POST['txtNota1']);
$nota2 = ($_POST['txtNota2']);
$nota3 = ($_POST['txtNota3']);
$notatotal= ($nota1+$nota2+$nota3/3);

$sentencia = $bd->prepare("UPDATE personas SET nombre = ?, nota1 = ?, nota2 = ?, nota3= ?, notatotal=? WHERE codigo = ?;");
$resultado = $sentencia->execute([$nombre, $nota1, $nota2, $nota3, $notatotal, $codigo]);

if ($resultado === TRUE) {
    header('location: index.php?mensaje=editado');
} else {
    header('location: index.php?mensaje=error');
    exit();
}

?>