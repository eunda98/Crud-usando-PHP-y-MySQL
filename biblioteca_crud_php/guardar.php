<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $Nombre = $_POST['Nombre'];
  $Idioma= $_POST['Idioma'];
  $Genero = $_POST['Genero'];
  $Duracion = $_POST['Duracion'];
  $query = "INSERT INTO cancion(Nombre, Idioma,Genero,Duracion) VALUES('$Nombre', '$Idioma','$Genero','$Duracion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error en la consulta.");
  }

  $_SESSION['message'] = 'Cancion guardada con exito';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>