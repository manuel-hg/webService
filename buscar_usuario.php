<?PHP
require("conexion.php");
$json=array();
$id_usuario_app=$_GET['id_usuario_app'];
$consulta = "SELECT CONCAT(nombre,' ', apellido) nombre_completo,mail,img_usuario_app from usuario_app WHERE id_usuario_app= '{$id_usuario_app}'";
$resultado=mysqli_query($conexion,$consulta);
		if($consulta){
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$results["nombre_completo"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>