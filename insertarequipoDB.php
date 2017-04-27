<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insercion de nuevos equipos</title>
  </head>
  <body>
    <?php
    //Se comprueba que se han rellenado todos los campos
    if (empty($_POST["nombre"])==false && empty($_POST["ciudad"])==false && empty($_POST["conferencia"])==false && empty($_POST["division"])==false) {
      //incluimos la base de datos
      include 'equipo.php';
      $equipo=new equipo();
      $resultado=$equipo->Insertarequipo($_POST["nombre"],  $_POST["ciudad"], $_POST["conferencia"], $_POST["division"]);
      echo "ULTIMO REGISTRO: <br>";
      $tablaequ=$equipo->DevolverEquipoNombre($_POST["nombre"]);
      foreach ($tablaequ as $fila) {
        echo "Nombre: " .$fila["Nombre"] ."<br>Ciudad: " .$fila["Ciudad"] ."<br>Conferencia: " .$fila["Conferencia"] ."<br>Division: " .$fila["Division"];
      }
      //Actualizamos.
      echo "<br>";
      echo "<a href='actualizarequipo.php?nombre=".$fila["Nombre"]."&ciudad=".$fila["Ciudad"]."&conferencia=".$fila["Conferencia"]."&division=".$fila["Division"]."'>Actualizar registro.</a>";
      //Enlace para borrar el registro.
      echo "<br>";
      echo "<a href='listaequipos.php'>Borrar registro.</a>";
    }else {
      echo "<a href='insertarequipo.php'> Debes rellenar todos los campos </a>";
    }
     ?>
  </body>
</html>
