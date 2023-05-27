<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA EMPLEADOS</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Está seguro? Se eliminará el empleado');
        }    
    </script>
    <link rel="stylesheet" href="css/Styles.css">
</head>
<body>

<?php
    include("conexion.php");
    // select
    $sql="select * from empleado";
    $resultado=mysqli_query($conexion,$sql);
?>

    <h1>LISTA EMPLEADOS</h1>
    <a href="agregar.php">Agregar Empleado</a><br>
    <table>
        <thead>
            <tr>
                <th>No. Empleado</th><br>
                <th>Nombre Empleado</th>
                <th>Salario Empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
                <?php
                // estructura de repeticion por si se quieren acceder a muchos datos
                    while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td> <?php echo $filas['id'] ?> </td>
                    <td> <?php echo $filas['nomcompleto'] ?> </td>
                    <td> <?php echo $filas['salario'] ?> </td>
                    <td> 
                        <?php echo "<a href='editar.php?id=".$filas['id']."' >EDITAR</a> "; ?> 
                        - 
                        <?php echo "<a href='eliminar.php?id=".$filas['id']."' 
                        onclick='return confirmar()'>ELIMINAR</a>"; ?> 
                    </td>
                </tr>
                <?php
                    }
                ?>
        </tbody>
    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>