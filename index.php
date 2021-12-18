<center>
<table >
<br>
<h1>BIENVENIDO A TOMAR NOTAS DE TAREAS PENDIENTES EN LINEA</h1><br>
<?php
    require_once 'conexion.php'; 
    error_reporting(0);
    session_start();
    if (isset($_SESSION['nombre']))
    {
      header('Location: my.php');
    }

    if (isset($_POST['username'])&&
        isset($_POST['password']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['username']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['password']);
        $query   = "SELECT * FROM usuarios WHERE username='$un_temp'";
        $result  = $conexion->query($query);
        
        if (!$result) die ("Usuario no encontrado <p><a href='registrarse.php'>Registrarse</a></p>");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[3])) 
            {
                session_start();
                $_SESSION['nombre']=$row[0];
                $_SESSION['apellido']=$row[1];
                $_SESSION['username']=$row[2];
                echo htmlspecialchars("Hola $row[0], has ingresado como '$row[0]'");
                die ("<p><a href='my.php'>
              Continuar</a></p>");
            }
            else {
                echo "Usuario/password incorrecto <p><a href='registrarse.php'>Registrarse</a>
            <a href='index.php'>Volver</a></p>";
            }
        }
        else {
          echo "Usuario/password incorrecto <p><a href='registrarse.php'>Registrarse</a>
            <a href='index.php'>Volver</a></p>";
      }   
    }
    else
    {
?>
      <h1>Iniciar sesion</h1>
      <form action="index.php" method="post"><pre>
      Usuario:  <input type="text" name="username">
      Password: <input type="password" name="password">
               <input type="submit" value="INGRESAR">
      </form>
      <form action="registrarse.php">
        <input type="submit" value="Registrarse">
      </form>
<?php
    }
    $conexion->close();

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