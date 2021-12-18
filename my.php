<?php include'conexion.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title> TAREAS EN LINEA</title>
  </head>
  <body>
  <center>
  <table>
  
  <?php 
  error_reporting(0);
      session_start();
      if (isset($_SESSION['nombre']))
      {
        $nombre = htmlspecialchars($_SESSION['nombre']);
        $apellido = htmlspecialchars($_SESSION['apellido']);
        $username= htmlspecialchars($_SESSION['username']);
      }
      else echo "Por favor <a href=index.php>Click aqui</a>
            para ingresar";
      
  ?>
    <h1>Notas De Tareas En Linea</h1>
    <?php echo "$nombre $apellido ";?>
    <form action="cerrar_sesion.php" method="post">
      <input type="submit" name="cerrarsesion" value="Cerrar Sesión">
    </form><br>
    <h2>Agregar Tarea</h2>
    <form action="nuevos.php" method="post">
      <input type="submit" name="nuevo" value="NUEVA TAREA">
    </form><br>
   
    <h2>Mostrar Tareas</h2>
    <form action="mostrar_pendientes.php" method="post">
      <input type="submit" name="pendientes" value="Pendientes">
    </form>
    <form action="mostrar_archivados.php" method="post">
      <input type="submit" name="archivados" value="Archivados">
    </form>
    <form action="mostrar_vencidas.php" method="post">
      <input type="submit" name="vencidos" value="Vencidos">
    </form>
    <form action="mostrar_todos.php" method="post">
      <input type="submit" name="todas" value="Todas">
    </form><br>
    
    <?php include'mostrar_pendientes.php';?>
    </table>
</center>
  </body>
</html>
