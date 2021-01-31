<?php
	require 'conexion.php';
    $id = $_GET['ID'];
    $estado = $_GET['Estado'];

    // echo $estado;

    if ($estado == 0) {
        echo 'Error...el pedido no esta listo, intente luego...';
    } else if ($estado == 2){
        echo 'Error...el pedido ya ha sido entregado';
    } else if ($estado == 1){
        echo 'Pedido entregado!!!';
        $sql="update pedido set Estado=2  where ID='".$id."'";
        $resultado = $mysqli->query($sql);
    }  
    header('location:pedidos2.php');//redirecciona a entregas.php
?>