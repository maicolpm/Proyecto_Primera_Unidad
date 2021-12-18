<center>
<table >
<?php

    include_once("conexion.php");
    error_reporting(0);
    if(isset($_REQUEST['nuevo']))
    {
        session_start();
        $username=$_SESSION['username'];
        if ($conexion->connect_error) die ("Fatal error");
        $id=rand(1,100000);
?>
            <form action="my.php">
              <input type="submit" value="Anterior">
            </form>
            <form class="" action="guardar_cambios.php"  method="post">
              <input type="hidden" name="id" value=<?php echo $id?>><br><br>
              Titulo:           <input type="text" name="titulo" ><br>
              Fecha registro:   <input type="datetime-local" name="fechainicio"><br>
              Fecha vencimiento:<input type="datetime-local" name="fechavencimiento">
              <br>Contenido : <br>
              <textarea name="contenido" rows="15" cols="70" ></textarea><br>
              <input type="hidden" name="archivado" value="no">
              <br>
              <input type=submit value="guardar">
              </form>
              
              <form action="my.php" >
                <input type='submit' value="Cancelar">
              </form>

<?php
        $result->close();
        $conexion->close();

        function get_post($con, $var)
        {
            return $con->real_escape_string($_POST[$var]);
        }
  }
  else {
  ?>
      <form action="my.php">
        <input type="submit" value="volver">
      </form>
  <?php
  }
?>
</center>
</table >