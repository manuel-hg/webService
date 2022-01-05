<?PHP
require("conexion.php");
$json=array();
$id_usuario=$_GET['id_usuario'];
$tienda=$_GET['tienda'];
$sku=$_GET['sku'];
$inventario_inicial=$_GET['inventario_inicial'];
$inventario_final=$_GET['inventario_final'];
$resurtido=$_GET['resurtido'];
$ventas=$_GET['ventas'];
$precio=$_GET['precio'];
$url_image=$_GET['url_image'];
$comentarios=$_GET['comentarios'];
$latitud=$_GET['latitud'];
$longitud=$_GET['longitud'];
$direccion=$_GET['direccion'];
$fecha=$_GET['fecha'];
$hora=$_GET['hora'];
$consulta_tienda= "SELECT id_tiendas_usuario from tiendas_usuario WHERE nombre_tienda='".$tienda."'";
$result=mysqli_query($conexion,$consulta_tienda);
$extract=mysqli_fetch_array($result);
$id_tienda_usuario= $extract[0];


$sql="INSERT INTO registros_app(id_usuario_app,id_tienda_usuario,sku,inventario_inicial,inventario_final,resurtido,ventas,precio,url_image,comentarios,latitud,longitud,direccion,fecha,hora) VALUES
(".$id_usuario.",".$id_tienda_usuario.",".$sku.",".$inventario_inicial.",".$inventario_final.",".$resurtido.",".$ventas.",".$precio.",'".$url_image."','".$comentarios."','".$latitud."','".$longitud."','".$direccion
."','".$fecha."','".$hora."')";
if($resultado=mysqli_query($conexion, $sql)){
    $json['datos'][]="Agregado correctamente";
echo json_encode($json);
}else{
	$json['datos'][]="No Agregado";
	echo json_encode($json);
}



mysqli_close($conexion);
?>