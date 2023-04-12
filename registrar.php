<?php
require_once 'templeat/header.php';
?>
  <?php
require "model/conexion.php";
  $sentencia= $bd -> query("SELECT * FROM personas");
$personas = $sentencia -> fetchAll(PDO::FETCH_OBJ);
 // print_r($personas);

?>

<div class="container mt-2" style="height: 1000px;  position: relative;">
    
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            <div class="card hola">
                <div class="card-header">
                    Lista de personas
                </div>
                <div class="p-4">
                    <div class="">
                        <table class="table align-middle ">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Opciones</th>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre y apellido</th>
                                    <th scope="col">Nota1</th>
                                    <th scope="col">Nota2</th>
                                    <th scope="col">Nota3</th>
                                    <th scope="col">NotaTotal</th>
                                    
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($personas as $dato){
                                ?>
                    
                                <tr class="">
                                    <td><a  class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></a></i></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3"></i></td>
                                    <td scope="row"> <?php echo $dato->codigo; ?> </td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->nota1; ?></td>
                                    <td><?php echo $dato->nota2; ?></td>
                                    <td><?php echo $dato->nota3; ?></td>
                                    <td><?php echo $dato->notatotal; ?></td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                    
                </div>
            </div>
        
        </div>
        <div class="col-md-5">
            <!--Alertas -->
            <?php 
            //si existe algun dato enviado por GET con una variable llamada ´mensaje´ se va a mostrar el error
            if (isset ($_GET['mensaje']) and $_GET['mensaje'] == 'Faltan') {
                
            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Por favor rellena todos los campos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            }
            ?>
              <?php 
            //si existe algun dato enviado por GET con una variable llamada ´mensaje´ se va a mostrar el error
            if (isset ($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                
            
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong>Se ha agregado al alumno con exito
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            }
            ?>

            <?php 
            //si existe algun dato enviado por GET con una variable llamada ´mensaje´ se va a mostrar el error
            if (isset ($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                
            
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>Vuelva a intentar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            }
            ?>

            <?php 
            //si existe algun dato enviado por GET con una variable llamada ´mensaje´ se va a mostrar el error
            if (isset ($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                
            
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Editado!</strong>Los datos han sido actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            }
            ?>

            <?php 
            //si existe algun dato enviado por GET con una variable llamada ´mensaje´ se va a mostrar el error
            if (isset ($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                
            
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong>Se han eliminado los datos con exito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
            }
            ?>

            
            <!--Alertas fin /-->
            <div class="card hola">
                <div class="card-header ">
                    Ingresar datos:
                </div>
                    <form action="register.php" method="POST" class="p-4">
                        <div class="mb-3">
                        <label class="form-label">Nombre </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                        </div>
                       
                        
                        <div class="mb-3">
                        <label class="form-label">Nota1 </label>
                        <input type="number" class="form-control" name="txtNota1" autofocus required>
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label">Nota2</label>
                        <input type="text" class="form-control" name="txtNota2" autofocus required>
                        
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nota3</label>
                        <input type="text" class="form-control" name="txtNota3" autofocus required>
                        
                        </div>

                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    
                    </form>                    
            </div>
        </div>
    </div>
  </div>
  <?php
  include_once 'templeat/footer.php';
  ?>
  </div>