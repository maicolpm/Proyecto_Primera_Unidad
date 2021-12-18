<?php

    include_once("conexion.php");
    error_reporting(0);
    session_start();
    date_default_timezone_set("America/Lima");
    $username=$_SESSION['username'];
    if ($conexion->connect_error) die ("Fatal error");

    if (isset($_POST['delete']) && isset($_POST['id']))
    {
      $id=$_REQUEST['id'];
        $query = "DELETE FROM tareas WHERE id='$id'";
        $result = $conexion->query($query);
        if (!$result) echo "BORRAR falló";
    }

    if(isset($_POST['EDITAR'])&& isset($_POST['id'])){
      $fecha_actual=date('Y-m-d H:i:s');
      $id=$_REQUEST['id'];
      $titulo=$_REQUEST['titulo'];
      $fechainicio=$_REQUEST['fechainicio'];
      $fechavencimiento=$_REQUEST['fechavencimiento'];
      $contenido=$_REQUEST['contenido'];
      $query="UPDATE tareas SET titulo='$titulo', fechainicio='$fechainicio', fechavencimiento='$fechavencimiento',
       contenido='$contenido' WHERE id='$id' and fechavencimiento >= '$fechainicio' ";
      $val= $conexion->query($query);
      if(!$val){
          echo "No se ha podido Modificar";
      }
      else {
          require_once 'guardar_cambios.php';
      }
    }

    if(isset($_POST['ARCHIVAR'])){
      $id=$_REQUEST['id'];
      $archivado=$_REQUEST['archivado'];
      $query="UPDATE tareas SET archivado='$archivado' WHERE id='$id'";
      $result= $conexion->query($query);
      if(!$result){
          echo "No se ha podido Modificar";
      }
      else {
          require_once 'guardar_cambios.php';
      }
    }
    if (
        isset($_POST['id']) &&
        isset($_POST['titulo']) &&
        isset($_POST['fechainicio']) &&
        isset($_POST['fechavencimiento']) &&
        isset($_POST['contenido'])&&
        isset($_POST['archivado']))
        {
        $username=$_SESSION['username'];
        $id=rand(1,100000);
        $titulo = get_post($conexion, 'titulo');
        $fechainicio = get_post($conexion, 'fechainicio');
        $fechavencimiento = get_post($conexion, 'fechavencimiento');
        $contenido = get_post($conexion, 'contenido');
        $archivado = get_post($conexion, 'archivado');
        $query = "INSERT INTO tareas VALUE" .
            "('$id', '$titulo', '$fechainicio', '$fechavencimiento', '$contenido', '$archivado','$username')";
        $result = $conexion->query($query);
        if (!$result) echo "Falló  al insertar<br><br>";
    }

    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }
    header("Location: my.php");
?>