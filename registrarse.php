<center>
<table >
<?php 
    require_once 'conexion.php';
    error_reporting(0);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $nombre = mysql_entities_fix_string($conexion, $_POST['nombre']);
        $apellido = mysql_entities_fix_string($conexion, $_POST['apellido']);
        $username = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);

        $password = password_hash($pw_temp, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios 
            VALUES('$nombre','$apellido','$username', '$password')";

        $result = $conexion->query($query);
        if (!$result) die ("Falló registro/ nombre de usuario ya exite <a href='registrarse.php'><br>Volver</a>");

       echo "Registro exitoso ";
?>
       <form action="index.php">
        <input type="submit" value="Ingresar">
      </form>
<?php
    }
    else
    {
?>
      <h1>Regístrate</h1>
      <form action="registrarse.php" method="post"><pre>
        Nombre:  <input type="text" name="nombre">
        Apellido:<input type="text" name="apellido">
        Usuario: <input type="text" name="username">
        Password:<input type="password" name="password">
                 <input type="hidden" name="reg" value="yes">
                 <input type="submit" value="REGISTRAR">
      </form>
      <form action="index.php">
        <input type="submit" value="Cancelar">
      </form>
      
<?php
    }
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }  
?>
</table>
</center> 