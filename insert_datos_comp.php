<?php
require("conexion.php");
$json=array();
$id_usuario=$_GET['id_usuario'];
$tienda=$_GET['tienda'];
$id_producto=$_GET['id_producto'];
$precio=$_GET['precio'];
$sku_comp=$_GET['sku_comp'];
$marca_comp=$_GET['marca_comp'];
$modelo_comp=$_GET['modelo_comp'];
$desc_comp=$_GET['desc_comp'];
$precio_comp=$_GET['precio_comp'];
$img_comp=$_GET['img_comp'];
$latitud=$_GET['latitud'];
$longitud=$_GET['longitud'];
$direccion=$_GET['direccion'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$consulta_tienda= "SELECT id_tiendas_usuario from tiendas_usuario WHERE nombre_tienda='".$tienda."'";
$result=mysqli_query($conexion,$consulta_tienda);
$extract=mysqli_fetch_array($result);
$id_tienda_usuario= $extract[0];
$id_producto=$id_producto+1;
$consulta_sku= "SELECT sku from producto where id_producto=$id_producto";
$resul_t=mysqli_query($conexion,$consulta_sku);
$extrac_t=mysqli_fetch_array($resul_t);
$mi_sku=$extrac_t[0];

$sql="INSERT INTO registros_comparacion(id_usuario_app,id_tienda_usuario,sku,precio,sku_comp,marca_comp,modelo_comp,desc_comp,precio_comp,img_comp,latitud,longitud,direccion,fecha,hora) VALUES
(".$id_usuario.",".$id_tienda_usuario.",'".$mi_sku."',".$precio.",'".$sku_comp."','".$marca_comp."',
'".$modelo_comp."','".$desc_comp."',".$precio_comp.",'".$img_comp."','".$latitud."','".$longitud."','"
.$direccion."','".$fecha."','".$hora."')";
if($resultado=mysqli_query($conexion, $sql)){
    $json['datos'][]="Agregado";
    echo json_encode($json);
}else{
			$json['datos'][]="No Agregado";
			echo json_encode($json);
}
mysqli_close($conexion);
?>