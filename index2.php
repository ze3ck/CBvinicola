<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA EMPLEADOS</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estás seguro? Se eliminarán los datos')
        }
    </script>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <th colspan="5">
                    <h1>Lista de Empleados</h1>
                </th>
            </tr>
            <tr>
                <td>
                    <label for="">Nombre:</label>
                    <input type="text" name="nomcompleto" id="">  
                </td>
                <td>
                    <label for="">Salario Empleado:</label>
                    <input type="text" name="salario" id="">  
                </td>
                <td>
                    <input type="submit" name="enviar" value="BUSCAR">
                </td>
                <td>
                    <a href="index.php">Mostrar Todos los Empleados</a>
                </td>
                <td>
                    <a href="agregar.php">Nuevo Empleado</a>
                </td>
            </tr>
        </table>
    </form>
    <table>
        <thead>
            <tr>
                <th>No. Empleado</th>
                <th>Nombre</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_POST['enviar'])) {
                    # Mostrar busqueda
                    $nomcompleto=$_POST['nomcompleto'];
                    $salario=$_POST['salario'];

                    if (empty($_POST['nomcompleto']) && empty($_POST['salario'])) {
                        # code...
                        echo " <script language='JavaScript'>
                            alert('Ingresa el nombre y/o salario');
                            location.assign('index.php');
                            </script>";
                    } else {
                        # code...
                        if(empty($_POST['nomcompleto'])){
                            $sql="select *  from empleado where salario=".$salario;

                        }
                        if(empty($_POST['salario'])){
                            $sql="select *  from empleado where nomcompleto like '%".$nomcompleto."%'";
                            
                        }
                        if(!empty($_POST['nomcompleto']) && !empty($_POST['salario'])){
                            $sql="select *  from empleado where salario=".$salario." and nomcompleto like
                            '%".$nomcompleto."%'";
                            
                        }
                    }
                    $resultado=mysqli_query($conexion,$sql);
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
                } else {
                    # Mostrar todos los empleados
                    $sql="select * from empleado";
                    $resultado=mysqli_query($conexion,$sql);
                
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
                    }        
                    ?>
            


        </tbody>
    </table>
</body>
</html>