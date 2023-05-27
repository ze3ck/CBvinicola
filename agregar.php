<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR EMPLEADO</title>
    <link rel="stylesheet" href="css/Styles.css">
</head>
<body>

    <?php
        if (isset($_POST['enviar'])) {
            $nomcompleto=$_POST['nomcompleto'];
            $salario=$_POST['salario'];

            include("conexion.php");
            // insert into emlpeado(nombre,salario)
            // values($nombre,$salario);
            $sql="insert into empleado(nomcompleto, salario)
            values('".$nomcompleto."', '".$salario."')";

            $resultado=mysqli_query($conexion,$sql);

            if ($resultado) {
                # datos se ingresaron correctamente en la BD
                echo " <script language='JavaScript'>
                alert('Los datos fueron ingresados correctamente en la BD');
                location.assign('listaEmp.php');
                </script>";
            } else {
                # datos NO se ingresaron correctamente en la BD
                echo " <script language='JavaScript'>
                alert('ERROR: Los datos NO fueron ingresados correctamente en la BD');
                location.assign('listaEmp.php');
                </script>";
            }
            mysqli_close($conexion);
            
        } else {
            # code...
        }    
    ?>

    <h1>Agregar Nuevo Empleado</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre:</label>
        <input type="text" name="nomcompleto" id=""><br>
        <label for="">Salario Empleado:</label>
        <input type="text" name="salario" id=""><br>
        <input type="submit" name="enviar" value="AGREGAR"><br>
        <a href="listaEmp.php">Regresar</a>
    </form>
</body>
</html>