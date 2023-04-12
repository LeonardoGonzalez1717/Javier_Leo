<?php require 'templeat/header.php' ?>

<?php 
    if (!isset($_GET['codigo'])) {
        header('location: index.php?mensaje=error');
        exit();
        
    }
    require_once 'model/conexion.php';
    $codigo= $_GET['codigo'];
//guardando datos que nos lleguen del GET para luego insertarlo en la BD, y poder cambiarlos mas abajo
    $sentencia= $bd->prepare('select * from personas where codigo = ?;');
    $sentencia->execute([$codigo]);
    $personas= $sentencia->fetch(PDO::FETCH_OBJ);
    
    
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

        
        <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                    <form action="editarproceso.php" method="POST" class="p-4">
                        <div class="mb-3">
                        <label class="form-label">Nombre </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value=" <?php echo $personas->nombre; ?>" > 
                        </div>
                       
                        
                        <div class="mb-3">
                        <label class="form-label">Nota1 </label>
                        <input type="text" class="form-control" name="txtNota1"  required
                        value=" <?php echo $personas->nota1; ?>" > 
                        </div>
                        
                        <div class="mb-3">
                        <label class="form-label">Nota2</label>
                        <input type="text" class="form-control" name="txtNota2" required
                        value=" <?php echo $personas->nota2; ?>" > 
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nota3</label>
                        <input type="text" class="form-control" name="txtNota3" required
                        value=" <?php echo $personas->nota3; ?>" > 
                        </div>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="codigo" value="<?php echo $personas->codigo; ?>">
                            <input type="submit" class="btn btn-primary" value="Editar">
                        </div>
                </div>                
                        
                    </form>
            </div>
    </div>
</div>
<?php require 'templeat/footer.php' ?>