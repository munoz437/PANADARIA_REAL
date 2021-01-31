<?php
	
	require 'conexion.php';
	
	$sql = "SELECT p.ID,p.Estado, p.nombre, p.apellido, p.telefono, p.fecha_entrega, p.personalizar, pa.nombre as nombre_pastel 
    from pedido as p inner join pastel as pa where p.tipo_pastel = pa.id order by p.fecha_entrega;";
    $resultado = $mysqli->query($sql);

  //CONEXION PARA LISTA DE PASTELES
	
	$sql_pastel = "SELECT * from pastel;";
    $resultado_pastel = $mysqli->query($sql_pastel);

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

    <form id="nuevo_pedido" name="nuevo_pedido" method="POST" action="nuevo.php">
        <div class="d-flex">
            <div class="col-sm-6">
                <!--ENCABEZADO DE COMPRAS-->
                <div class="card">
                    <!-- <form action="" method="post"> -->
                    <div class="card-body">
                        <center><label>
                                <h3><b>DATOS DEL CLIENTE</b></h3>
                            </label></center>
                        <div class="form-group d-flex">
                            <label>Id Pedido</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="txt_id" placeholder="ID" name="id_venta"
                                    value="" readonly="">
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
                                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombres"
                                    required>
                            </div>
                            <div class="col-sm-4">
                                <label>Apellidos</label>
                                <input class="form-control" id="apellido" name="apellido" type="text"
                                    placeholder="Apellidos" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Telefono" value="" required="">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-5">
                                <label>Fecha y Hora de Entrega</label>
                                <input class="form-control" id="fecha_entrega" type="datetime-local"
                                    name="fecha_entrega" id="fecha_entrega" required>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <!-- <div class="col-sm-4 d-flex">
                                <input type="submit" class="btn btn-outline-info" id="btn_agregar" name="btn_agregar"
                                    value="Agregar" onclick="habilitar()">
                            </div> -->
                            <div class="col-sm-4">
                                <input type="reset" class="btn btn-outline-primary" id="" name="" value="Limpiar" >
                               
                            </div>
                            <!-- <div class="col-sm-4">
                                <a href="salir_ventas_cliente.htm?id=0" class="btn btn-outline-dark">Regresar</a>
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
                                <select class="form-control" id="tipo_pastel" name="tipo_pastel"
                                    aria-placeholder="Tipo Pastel" required>
                                    <option></option>
                                    <?php while($fila_pastel = $resultado_pastel->fetch_assoc()) { ?>
                                    <option value="<?php echo $fila_pastel['ID']; ?>">
                                        <?php echo $fila_pastel['Nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Precio Unitario</label>
                                <!-- <input type="text" name="precio" value="<?php echo $fila_pastel['Precio']; ?>"
                                    class="form-control" placeholder="Q/0.00" readonly required=""> -->
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
                                <textarea class="form-control" name="personalizar" id="personalizar" cols="30" rows="3"
                                    required>
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group d-flex">
                            <div class="col-sm-4 d-flex">
                                <input type="submit" class="btn btn-outline-info" id="btn_agregar"
                                    name="btn_agregar_producto" value="Agregar">
                            </div>
                            <div class="col-sm-4">
                                <input type="reset" class="btn btn-outline-primary" id="" name="" value="Limpiar" >
                                <!-- <a href="buscar_productos.htm?id=0" class="btn btn-outline-primary">Limpiar</a> -->
                            </div>
                            <!-- <div class="col-sm-4">
                                <a href="salir_ventas_cliente.htm?id=0" class="btn btn-outline-dark">Regresar</a>
                            </div> -->
                        </div>
                    </div>
    </form>
    </div>
    </div>
    </div>
    </form>
    <br>
    <!--TABLA DE PRODUCTOS-->
    <div class="col-sm-12">
        <div class="card">
            <form method="post">
                <div class="card-body">
                    <div class="d-flex col-sm-5 ml-auto form-group">
                        <!--<div class="col-sm-5 d-flex">-->
                        <!--</div>-->
                        <div class="col-sm-6">
                            <!--<input type="button" name="btn_buscar" value="buscar" class="btn btn-outline-success form-control">-->
                            <!-- <a href="ventas_cliente.htm?id=${datos_id}" class="btn btn-outline-success form-control">Ver
                                Ventas</a> -->
                            <br>
                        </div>

                    </div>
                    <center>
                        <h3><b>PRODUCTOS</b></h3>
                    </center>
                    <table class="table text-center table-bordered table-stripeds">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Tipo de Pastel</th>
                                <th scope="col">Personalizado</th>
                                <th scope="col">Fecha y Hora de Entrega</th>
                                <th scope="col">Operaciones</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fila = $resultado->fetch_assoc()) { ?>
                            

                            <tr>
                                <th scope="row"><?php echo $fila['ID']; ?></th>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['nombre_pastel']; ?></td>
                                <td><?php echo $fila['personalizar']; ?></td>
                                <td><?php echo $fila['fecha_entrega']; ?></td>
                                <td>
                                    <!-- BOTON IMPRIMIR -->
                                    <a href="imprimir.php?ID=<?php echo $fila['ID']; ?>" class="btn btn-info text-dark">
                                        <i class='bx bx-printer'></i>
                                    </a>

                                    <!-- BOTON ESTADO -->
                                    <a href="entregar.php?ID=<?php echo $fila['ID']?>&Estado=<?php echo $fila['Estado']?>" class="btn btn-success">
                                        <i class='bx bx-check'></i>
                                    </a>
                                    <!--BOTON EDITAR -->
                                    <a href="editar.php?ID=<?php echo $fila['ID']; ?>" class="btn btn-warning">
                                        <i class='bx bxs-edit'></i>
                                    </a>

                                    <!-- BOTON ELIMINAR -->
                                    <a href="eliminar.php?ID=<?php echo $fila['ID']; ?>" class="btn btn-danger text-dark">
                                        <i class='bx bxs-trash-alt'></i>
                                    </a>

                                </td>
                                <td>
                                    <?php 
                                        if ($fila['Estado'] == 0) {
                                            echo 'No listo';
                                        } else if ($fila['Estado'] == 1) {
                                            echo 'Listo';
                                        } else if ($fila['Estado'] == 2) {
                                            echo 'Entregado';
                                        }
                                    ?>
                                </td>
                            </tr>
                            </td>
                            </tr>

                            
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- <div class="card-footer">
                    <!--<input type="submit" class="btn btn-success" id="btn_agregar" name="btn_agregar" value="Generar Compra">-->
                    <!--<a href="salir.htm?id=0" class="btn btn-danger">Cancelar</a>
                    <a href="salir_ventas_cliente.htm?id=0" class="btn btn-dark">Regresar</a>
                </div> -->
            </form>
        </div>

    </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>