<?php

include("db.php");

if(isset($_GET['Codigo'])) {
  $Codigo = $_GET['Codigo'];
  $query = "DELETE FROM cancion WHERE Codigo = $Codigo";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error en la consulta.");
  }

  $_SESSION['message'] = 'Cancion eliminada satisfatoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>