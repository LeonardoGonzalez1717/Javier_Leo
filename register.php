<?php 
print_r($_POST);
//Validacion de datos, registrando los datos q se envien del formulario atraves del $_POST, con el "Name" del formulario.
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtNota1"]) ||
     empty($_POST["txtNota2"]) || empty($_POST["txtNota3"])) {
        header('location: index.php?mensaje=Faltan');
        exit();  
    }
    //Conexion a la base de datos
    require_once 'model/conexion.php';
    //Guardamos los datos que nos lleguen del formulario POST en variables 
    $nombre= $_POST["txtNombre"];
    $nota1= $_POST["txtNota1"];
    $nota2= $_POST["txtNota2"];
    $nota3= $_POST["txtNota3"];
    $suma = ($nota1+$nota2+$nota3);
    $notatotal= ($suma/3);
    

    //vinculando los datos que nos lleguen del formulario a la base de datos
    $sentencia = $bd->prepare("INSERT INTO personas(nombre,nota1,nota2,nota3,notatotal) values(?,?,?,?,?);");
    $resultado = $sentencia ->execute([$nombre, $nota1,$nota2,$nota3,$notatotal]);

    if ($resultado === true) {
        header("location: index.php?mensaje=registrado"); 
    } else {
         header('location: index.php?mensaje=Error');
        exit();  
    
    }
    
?>