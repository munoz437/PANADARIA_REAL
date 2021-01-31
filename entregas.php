<?php
  
  //CONEXION PARA LISTA DE PEDIDOS
	require 'conexion.php';
	
	$sql = "SELECT p.ID,p.Estado, p.nombre, p.apellido, p.fecha_entrega, p.personalizar, pa.nombre as nombre_pastel 
  from pedido as p inner join pastel as pa where p.tipo_pastel = pa.id order by p.ID;";
  $resultado = $mysqli->query($sql);
	
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
    <script>
			$(document).ready(function() {
			$('#tabla').DataTable();
			} );
    </script>
    
    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--  background: #348F50;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #56B4D3, #348F50);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #56B4D3, #348F50);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ -->

    <style>
        body {
          background: #000000;  /* fallback for old browsers */
          background: -webkit-linear-gradient(to right, #434343, #000000);  /* Chrome 10-25, Safari 5.1-6 */
          background: linear-gradient(to right, #434343, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */



        }
    </style>

</head>

<body>
    
   <!-- menu -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    
    Panaderia la Merced</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="pedidos.php">
          <i class='bx bx-home-alt'></i>
          Inicio
         
        </a>
        
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">
          <i class='bx bxs-contact'></i>
          Contacto
         
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class='bx bx-menu' ></i>
          Menú
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="pedidos.html">
            <i class='bx bx-home-alt'></i>
            Inicio
          </a>
         
          <a class="dropdown-item" href="contacto.php">
            <i class='bx bxs-contact'></i>
            Contacto
          </a>

        </div>
      </li>
    </ul>
  </div>
</nav>

    <!-- tabla -->
    <div class="container table-responsive">
        <h2 class="text-white text-center" >Entregas</h2>
      
        <table class="table table-dark text-center table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Tipo de Pastel</th>
                    <th scope="col">Personalizado</th>
                    <th scope="col">Fecha y Hora de Entrega</th>
                    <th scope="col">Operaciones</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>

            <tbody>
              <?php while($fila = $resultado->fetch_assoc()) { ?>
                <?php if($fila['Estado']==0) { ?>
              
                <tr>
                    <th scope="row"><?php echo $fila['ID']; ?></th>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['nombre_pastel']; ?></td>
                    <td><?php echo $fila['personalizar']; ?></td>
                    <td><?php echo $fila['fecha_entrega']; ?></td>
                    <td>
                        <button class="btn btn-info text-dark">
                          <i class='bx bx-printer'></i>
                        </button>
                        
                        <button class="btn btn-warning">
                        <i class='bx bxs-edit'></i>
                        </button>

                        <a href="eliminar.php?ID=<?php echo $fila['ID']; ?>" class="btn btn-danger text-dark">
                        <i class='bx bxs-trash-alt'></i>
                        </a>
                    </td>
                    <td>
                        <a href="editar.php?ID=<?php echo $fila['ID'] ?>" class="btn btn-success">
                        <i class='bx bx-check'></i>
                        </a>
                    </td>
                </tr>
                </td>
                </tr>

                <?php }//end if ?>
              <?php } ?>               
            </tbody>
        </table>

    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
