<?php

$nombre_usuario=$_POST['nombre_usuario'];
$clave=$_POST['clave'];

// Conexion a BD


// LOCALHOST
// server, usuario, clave, nombreBD
$conexion=mysqli_connect("localhost","root","","Vinicola");
$consulta="SELECT * FROM usuario WHERE nombre_usuario='$nombre_usuario' AND clave='$clave'";
// ejecuta consulta mediante parametros conexion y la consulta como tal
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas > 0) {
    header("location:index.php");
} else {
    echo "Error en la Autentificacion";
}


/*
// WEBHOST
// server, usuario, clave, nombreBD
$conexion=mysqli_connect("localhost","id20803382_root","#Hola1234","id20803382_vinicoladb");
$consulta="SELECT * FROM usuario WHERE nombre_usuario='$nombre_usuario' AND clave='$clave'";
// ejecuta consulta mediante parametros conexion y la consulta como tal
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);
if ($filas > 0) {
    header("location:listaEmp.php");
} else {
    echo "Error en la Autentificacion";
}
*/
mysqli_free_result($resultado);
mysqli_close($conexion);
?>