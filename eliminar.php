<?php
    $id=$_GET['id'];
    include("conexion.php");

    // delete from empleado where id=$id
    $sql="delete from empleado where id='".$id."'";
    $resultado=mysqli_query($conexion,$sql);

    if ($resultado) {
        # Si se elimino correctamente el empleado de la BD
        echo " <script language='JavaScript'>
                alert('El empleado fue eliminado correctamente de la BD');
                location.assign('index.php');
                </script>";
    } else {
        # Si NO elimino correctamente el empleado de la BD
        echo " <script language='JavaScript'>
                alert('El empleado NO fue eliminado correctamente de la BD');
                location.assign('index.php');
                </script>";
    }
?>