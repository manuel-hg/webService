
<?PHP
require("conexion.php");
$json=array();
$id_usuario_app=$_GET['id_usuario_app'];
$consulta = "SELECT A.id_rol_usuario,B.nombre_tienda from rol_usuario A INNER JOIN tiendas_usuario B ON B.id_tiendas_usuario=A.id_tiendas_usuario WHERE id_usuario_app='{$id_usuario_app}'";
$resultado=mysqli_query($conexion,$consulta);
			if($consulta){
		while ($fila = mysqli_fetch_array($resultado)){
				$json['datos'][]=$fila;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$results["id_tiendas_usuario"]='';
			$results["nombre_tienda"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>