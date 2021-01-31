<?php
require'conexion.php';
$id=$_GET['ID'];
$sql="delete from pedido where ID='".$id."'";
$resultado = $mysqli->query($sql);
header('location:pedidos2.php');

?>