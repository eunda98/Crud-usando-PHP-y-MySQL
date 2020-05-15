<?php
include("db.php");
$Nombre = '';
$Idioma= '';
$Genero = '';
$Duracion = '';

if  (isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "SELECT * FROM cancion WHERE Codigo=$Codigo";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Idioma= $row['Idioma'];
    $Genero = $row['Genero'];
    $Duracion = $row['Duracion'];
  }
}

if (isset($_POST['Actualizar'])) {
  $Codigo = $_GET['Codigo'];
  $Nombre = $_POST['Nombre'];
  $Idioma= $_POST['Idioma'];
  $Genero = $_POST['Genero'];
  $Duracion = $_POST['Duracion'];

  $query = "UPDATE cancion set Nombre = '$Nombre', Idioma = '$Idioma', Genero = '$Genero', Duracion = '$Duracion' WHERE Codigo=$Codigo";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Cancion actualizada con exito';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?Codigo=<?php echo $_GET['Codigo']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Actualizar nombre">
        </div>
        <div class="form-group">
          <input name="Idioma" type="text" class="form-control" value="<?php echo $Idioma; ?>" placeholder="Actualizar Idioma ">
        </div>
        <div class="form-group">
          <input name="Genero" type="text" class="form-control" value="<?php echo $Genero; ?>" placeholder="Actualizar Genero">
        </div>
        <div class="form-group">
          <input name="Duracion" type="time" class="form-control" value="<?php echo $Duracion; ?>" placeholder="Actualizar Duracion">
        </div>
        <button class="btn-success" name="Actualizar">
        Actualizar
       </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>