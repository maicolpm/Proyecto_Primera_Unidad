<center>
<table >
<style>
        table{
        table-layout: fixed;
        width: 250px;
    }
    th, td {
        border: 1px solid ;
        width: 600px;
        word-wrap: break-word;
    }
  </style>
<?php 
    include_once("conexion.php");
    error_reporting(0);
    session_start();
    $username=$_SESSION['username'];
?>
    <form action="my.php" >
            <input type='submit' value="REGRESAR">
    </form>
<?php
    echo "<h2>Todas las Tareas</h2>";
    $query = "SELECT * FROM tareas WHERE username='$username' ORDER BY fechavencimiento ASC";
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

?>
        <pre>
        <tr>
            titulo: <?php echo $r1?> <br>
            Fecha de Registro: <?php echo $r2?><br>
            Fecha de vencimiento: <?php echo $r3?><br>
            Contenido:<br>
        </tr>
            <table>
              <tr>
                <td>
                <?php echo $r4?>
                </td>
              </tr>
            </table>
            <table>   <br>
        </pre>
        <form action='eliminar.php' method='post'>
          <input type='hidden' name='delete' value='yes'>
          <input type='hidden' name='id' value= <?php echo $r0?> >
          <input type='submit' value='BORRAR REGISTRO'>
        </form>
        <br><br>
<?php
    }
    $result->close();
    $conexion->close();
    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }
  
?>
</table>
</center> 