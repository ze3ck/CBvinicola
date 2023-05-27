<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR EMPLEADO</title>
    <link rel="stylesheet" href="css/Styles.css">
</head>
<body>

    <?php
    // Si el usuario presiono el btn de enviar datos hacia la BD
        if (isset($_POST['enviar'])) {
            # entra cuando se presiona el btn enviar
            $id=$_POST['id'];
            $nomcompleto=$_POST['nomcompleto'];
            $salario=$_POST['salario'];

            // crear estructura UPDATE a la BD
            // update empleado set
            // nomcompleto=$nomcompleto, salario=$salario where id=$id;
            $sql="update empleado set nomcompleto='".$nomcompleto."', salario='".$salario."' 
            where id='".$id."'";

            $resultado=mysqli_query($conexion,$sql);
            // Verificar el resultado de la VAR resultado
            if ($resultado) {
                # En el caso que se actualicen los datos
                echo " <script language='JavaScript'>
                alert('Los datos fueron actualizados correctamente en la BD');
                location.assign('index.php');
                </script>";
            } else {
                # En el caso que no se actualicen los datos
                echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron actualizados correctamente en la BD');
                location.assign('index.php');
                </script>";
            }
            mysqli_close($conexion);
        } else {
            #  cuando NO se presiona el btn enviar
            $id=$_GET['id'];
            $sql="select * from empleado where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            $fila=mysqli_fetch_assoc($resultado);
            $nomcompleto=$fila["nomcompleto"];
            $salario=$fila["salario"];
        }
        mysqli_close($conexion);
    ?>

    <h1>Editar Empleado</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre Empleado:</label>
        <input type="text" name="nomcompleto" value=" <?php echo $nomcompleto; ?>"><br>

        <label for="">Salario Empleado:</label>
        <input type="text" name="salario" value="<?php echo $salario; ?>"><br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR"><br>
        <a href="listaEmp.php">Regresar</a>
    </form>
</body>
</html>