<?php  
require("conexion.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DefaultId = 0;
 
    $ImageData = $_POST['image_path'];
 
    $ImageName = $_POST['image_name'];

    $GetOldIdSQL ="SELECT id FROM img_registros_app ORDER BY id ASC";
 
    $Query = mysqli_query($conexion,$GetOldIdSQL);
 
    while($row = mysqli_fetch_array($Query)){
 
    $DefaultId = $row['id'];
}
$ImagePath = "images/images_registros_app/$DefaultId.png";
$ServerURL = "http://app.bartecmx.com.mx/$ImagePath";
$fecha =date('d-m-Y');
$InsertSQL = "insert into img_registros_app (img_path,img_name,fecha) values ('$ServerURL','$ImageName','$fecha')";
if(mysqli_query($conexion, $InsertSQL)) {
    file_put_contents($ImagePath,base64_decode($ImageData));
}
mysqli_close($conexion);
} else {
    echo "No se inserto";
}

?>
