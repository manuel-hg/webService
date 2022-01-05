<?PHP
require("conexion.php");
$json=array();
	if(isset($_GET["username"]) && isset($_GET["password"])){
		$username=$_GET['username'];
		$password=$_GET['password'];
		$consulta="SELECT id_usuario_app,username,password  FROM login_app WHERE username= '{$username}' AND password ='{$password}'";
		$resultado=mysqli_query($conexion,$consulta);
		if($consulta){
		
			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$results["id_usuario_app"]='';
			$results["username"]='';
			$results["password"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{
		   	$results["id_usuario_app"]='';
			$results["username"]='';
			$results["password"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>