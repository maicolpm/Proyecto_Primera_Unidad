<center>
<table >
<?php
    include_once("conexion.php");
    error_reporting(0);
    if(isset($_REQUEST['EDITAR'])){
        $id=$_POST['id'];
        $query = "SELECT * FROM tareas where id='$id'";
        $result = $conexion->query($query);
        if (!$result) die ("Falló el acceso a la base de datos");

        $rows = $result->num_rows;
        
        for ($j = 0; $j < $rows; $j++)
        {
            $row = $result->fetch_array(MYSQLI_NUM);

            $r0 = htmlspecialchars($row[0]);
            $r1 = htmlspecialchars($row[1]);
            $r2 = htmlspecialchars($row[2]);
            $r3 = htmlspecialchars($row[3]); 
            $r4 = htmlspecialchars($row[4]); 
        }
?>
        <form action="my.php">
            <input type="submit" value="Atras">
        </form><br><br>
        <form class="" action="guardar_cambios.php"  method="post">
        
            <input type="hidden" name="id" value=<?php echo $r0?>>
            Nuevo Titulo: <input type="text" name="titulo" value=<?php echo $r1?>><br>
            Fecha registro: <input type="datetime" name="fechainicio" value=<?php echo $r2?>><br>
            Fecha vencimiento: <input type="datetime" name="fechavencimiento" value=<?php echo $r3?>>
            <br>
            Contenido:<br>
            <textarea name="contenido" rows="15" cols="70" ><?php echo $r4?></textarea><br>
            <br>
            <input type=submit name="EDITAR" value="guardar">
        </form>
        <form action="my.php">
            <input type="submit" value="CANCELAR">
        </form>
    
<?php
    }
    else {
?>
        <form action="my.php">
            <input type="submit" value="volver">
        </form>
<?php
    }
?>
</table>
</center> 