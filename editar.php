<?php
require'conexion.php';
$id=$_GET['ID'];
$sql="select * from pedido where ID='".$id."'";
$resultado = $mysqli->query($sql);
//header('location:pedidos2.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <!-- boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <style>
    body {
        background: #000000;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #434343, #000000);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #434343, #000000);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
                    <a class="nav-link" href="pedidos2.php">
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
                        <i class='bx bx-menu'></i>
                        Menú
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="pedidos2.html">
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
    <br>

    <?php while($fila = $resultado->fetch_assoc()) { ?>
    
    <form >
        <div class="d-flex">
            <div class="col-sm-6">
                <!--ENCABEZADO DE COMPRAS-->
                <div class="card">
                    <!-- <form action="" method="post"> -->
                    <div class="card-body">
                        <center><label><h3><b>DATOS DEL CLIENTE</b></h3></label></center>
                        <div class="form-group d-flex">
                            <label>Id Pedido</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="id_venta" placeholder="ID" name="id_venta" value="<?php echo $fila['ID'] ?>" readonly="">
                            </div>
                            <label>Fecha y Hora actual</label>
                            <div class="col-sm-4">
                                <!-- <input class="form-control" id="fecha_pedido" type="datetime-local" name="fecha_pedido" id="fecha_pedido"  required> -->
                                <?php
                                        date_default_timezone_set("America/Guatemala");
                                        echo "<input class='form-control' id='fecha_pedido' 
                                        type='text' name='fecha_pedido' id='fecha_pedido' readonly value='".date("Y-m-d G:i:s")."'>"; 
                                        ?>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-4">
                                <label>Nombres</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombres" value="<?php echo $fila['Nombre'] ?>"required>
                            </div>
                            <div class="col-sm-4">
                                <label>Apellidos</label>
                                <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellidos" value="<?php echo $fila['Apellido'] ?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $fila['Telefono'] ?>" required="">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-5">
                                <label>Fecha y Hora de Entrega</label>
                                <input class="form-control" id="fecha_entrega" type="text" readonly
                                    name="fecha_entrega" id="fecha_entrega" value="<?php echo $fila['Fecha_Entrega'] ?>"required>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            
                            <!-- <div class="col-sm-4">
                                <input type="reset" class="btn btn-outline-primary" id="" name="" value="Limpiar" >
                               
                            </div> -->

                            
                         
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
            <!--DETALLE DE VENTAS-->
            <div class="col-sm-6">
                <div class="card">
                    <!-- <form action="" method="post"
                        id="form_detalle_venta"> -->
                    <div class="card-body">
                        <center><label>
                                <h3><b>DATOS DEL PASTEL</b></h3>
                            </label></center>
                        <div class="form-group d-flex">
                            <div class="col-sm-4">
                                <label>Pastel</label>
                                <select class="form-control" id="tipo_pastel" name="tipo_pastel" aria-placeholder="Tipo Pastel" >
                                    <option></option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Precio Unitario</label>
                               
                                    <input class="form-control" type="text">

                            </div>
                            <div class="col-sm-4">
                                <label>Cantidad de Personas</label>
                                <input type="number" name="cantidad_disponible" value="${datos_exis}" id="cd"
                                    class="form-control" placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-12">
                                <label>Personalizar</label>
                                <input class="form-control" name="personalizar" id="personalizar" cols="30" rows="3"
                         value="<?php echo $fila['Personalizar'] ?>" required>


                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-4 d-flex">
                                <input type="submit" class="btn btn-outline-warning" 
                                    name="btn_editar" value="Actualizar">
                            </div>
                            <div class="col-sm-4">
                                <a href="pedidos2.php" class="btn btn-outline-danger">
                                    Cancelar
                                </a> 
                            </div>
                            
                        </div>
                    </div>
    </form>
    </div>
    </div>
    </div>
    <?php } ?>
   


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>

<?php
//ACTUALIZAR
//if (isset($_POST["btn_editar"])){ 
    $idp =$_GET['id_venta'];
    $nombre = $mysqli->real_escape_string($_POST['nombre']);
    $apellido = $mysqli->real_escape_string($_POST['apellido']);
    $telefono = $mysqli->real_escape_string($_POST['telefono']);
    $fecha_pedido = $mysqli->real_escape_string($_POST['fecha_pedido']);
    $fecha_entrega = $mysqli->real_escape_string($_POST['fecha_entrega']);
    $tipo_pastel = $mysqli->real_escape_string($_POST['tipo_pastel']);
    $personalizar = $mysqli->real_escape_string($_POST['personalizar']);
	
	$sql2 = "UPDATE  pedido (nombre, apellido, telefono, Fecha_Pedido, Fecha_Entrega, Personalizar) VALUES 
	('$nombre', '$apellido', '$telefono', '$fecha_pedido', '$fecha_entrega',  '$personalizar') where ID='$idp'";
	$resultado = $mysqli->query($sql2);
	if($resultado>0){
		header('location:pedidos2.php');
		
	} else {
		echo 'ERROR AL EDITAR REGISTRO';
	}


//}
   
	


?>