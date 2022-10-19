<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos</title>
  <style>table, td{border : 1px solid black}</style>
</head>
<body>
<?php
  include "functions.php";
  //Limpiando valores
  $_POST["nombre"] = clean($_POST["nombre"]);
  $_POST["email"] = clean($_POST["email"]);

  //Limpiando y verificando los 2 apellidos
  if (array_key_exists("apellido", $_POST)){ 
    $_POST["apellido"] = clean($_POST["apellido"]);
    if (!verifyLastName($_POST["apellido"])){
      exit("Apellido inválido");
    }
  }
  if (array_key_exists("apellido2", $_POST)){ 
    $_POST["apellido2"] = clean($_POST["apellido2"]);
    if (!verifyLastName($_POST["apellido2"])){
      exit("Apellido inválido");
    }
  }

    //Verificando valores y comprobando si no están vacios
  if (!empty($_POST["nombre"]) &&
      !empty($_POST["email"])  &&
      !empty($_POST["sexo"])   &&
      verifyName($_POST["nombre"]) &&
      verifyEmail($_POST["email"]) == $_POST["email"])
      {
        //Añadir usuario al archivo
        addUserTo("datos.txt", $_POST);
        //Crear tabla con los valores
        echo("<h1>Datos Alumnos</h1>");
        echo("<table>");
          echo("<tr>");
            echo("<td>Nombre</td><td>Apellidos</td><td>Email</td><td>Sexo</td>");
          echo("</tr>");
          echo("<tr>");
            echo("<td>".$_POST["nombre"]."</td><td>".$_POST["apellido"]." ".$_POST["apellido2"]."</td><td>".$_POST["email"]."</td><td>".$_POST["sexo"]."</td>");
          echo("</tr>");
        echo("</table>");              
      } else {
        exit("Algún campo obligatorio esta vacio o es inváido");
      }
?>
</body>
</html>