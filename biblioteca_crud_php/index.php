<?php include("db.php");

$query = "SELECT * FROM cancion";
$result_can = mysqli_query($conn, $query);
$result=mysqli_fetch_all($result_can);

$total=count($result);
$cancione_x_pag = 5;
$paginas=$total/$cancione_x_pag;
$paginas=ceil($paginas);

?>
<?php include("includes/header.php");?>
    
<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="Nombre" class="form-control" placeholder="Nombre de cancion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Idioma" class="form-control" placeholder="Idioma" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Genero" class="form-control" placeholder="Genero" autofocus>
          </div>
          <div class="form-group">
          <input type="time" name="Duracion" class="form-control" placeholder="Duracion" autofocus>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
    
       <FORM METHOD=POST ACTION="buscar.php">
           Buscar: <INPUT TYPE="text" NAME="busqueda">
        </FORM>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Idioma</th>
            <th>Genero</th>
            <th>Duracion</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
            if(!$_GET['pagina']){
                header('location:index.php?pagina=1');
            }
            $iniciar=($_GET['pagina']-1)*$cancione_x_pag;

            $query = "SELECT * FROM cancion limit  $iniciar,$cancione_x_pag";
            $result_can = mysqli_query($conn, $query); 
        ?>
          <?php
            
          while($row = mysqli_fetch_assoc($result_can)) { ?>
          <tr>
            <td><?php echo $row['Nombre']; ?></td>
            <td><?php echo $row['Idioma']; ?></td>
            <td><?php echo $row['Genero']; ?></td>
            <td><?php echo $row['Duracion']; ?></td>
            <td>
              <a href="editar.php?Codigo=<?php echo $row['Codigo']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar.php?Codigo=<?php echo $row['Codigo']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
     </div>
   </div>
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled':''?>">
      <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>" tabindex="-1">Anterior</a>
    </li>
    <?php for ($i=0; $i <$paginas ; $i++) { ?>
        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $i+1 ?>">
        <?php echo $i+1 ?>
        </a></li>
 
        <?php } ?>

    <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled':''?>">
      <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
    </li>
 </ul>
 </nav>
 </main>
<?php include("includes/footer.php")?>
