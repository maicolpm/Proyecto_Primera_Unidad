<table>
<center> 
<?php
    include_once("conexion.php");
    error_reporting(0);
    if(isset($_REQUEST['delete'])){
        
        $id=$_POST['id'];
        $query = "SELECT * FROM tareas where id='$id'";
        $result = $conexion->query($query);
        if (!$result) die ("Falló el acceso a la base de datos");

        $rows = $result->num_rows;

        for ($j = 0; $j < $rows; $j++)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $r0 = htmlspecialchars($row[0]);
        }
?>
        ¿Estas seguro de que quieres eliminar la tarea?
        <form class="" action="guardar_cambios.php"  method="post">
            <input type="hidden" name="id" value=<?php echo $r0?>>
            <input type=submit name="delete" value="BORRAR TAREA">
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