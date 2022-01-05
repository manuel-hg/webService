<?php
require("conexion.php");
$json=array();
$sku=$_GET['sku'];
$consulta ="SELECT A.sku,B.marca_producto,C.modelo_producto,A.descripcion FROM producto A INNER JOIN marca_producto B ON B.id_marca_producto=A.id_marca_producto INNER JOIN modelo_producto C ON C.id_modelo_producto=A.id_modelo_producto WHERE sku=".$sku;
$resultado=mysqli_query($conexion,$consulta);
if($fila = mysqli_fetch_array($resultado)){
    $json['datos'][]=$fila;
    echo json_encode($json);
}
else{
	$json['datos'][]=null;
	echo json_encode($json);
}
mysqli_close($conexion);
?>