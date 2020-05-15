<?php include("db.php");?> 

  <?php include("includes/header.php");?>  
  <div class="col-md-8">
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
     ?>
       <?php
           if (isset($_POST['busqueda'])){
            $busqueda=($_POST['busqueda']);
              $cadbusca ="SELECT * FROM cancion WHERE Nombre  LIKE  '%$busqueda%' OR Idioma LIKE  '%$busqueda%' OR Genero LIKE  '%$busqueda%' ";
              $result_can = mysqli_query($conn, $cadbusca); 
            }   

            if (isset($_POST['Regresar'])) {
                header('Location: index.php');
              }

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
  <button class="btn-success" name="Regresar">
       Regresar
       </button>
  </div>
     </main>
<?php include('includes/footer.php'); ?>