<?php
$user= "root";
$pass= "";
$host= "localhost";

$connection = mysqli_connect($host, $user, $pass);

$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];

session_start();
$_SESSION['usuario']=$usuario;

if(!$connection){
    echo "No se ha podido establecer conexion con el servidor" . mysql_error();
}
else{
    echo "<h3>Se ha establecido conecion con el servidor</h3>";
}

$datab = "registro";

$db = mysqli_select_db($connection,$datab);

if(!$db){
    echo "No se ha podido encontrar la tabla";
}
else{
    echo "<h3>tabla encontrada</h3>";
}

$resultado = mysqli_query($connection, "SELECT * FROM registro WHERE Nombre= '".$usuario."', Correo='".$correo."' AND Contraseña='".$contraseña."'");

?>

<script type="text/javascript">
  jsFunction();
</script>