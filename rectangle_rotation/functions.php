<?php
function matrixTable($matrix){
  echo("<table>");
  for ($i = 0; $i < count($matrix); $i++){
      echo("<tr>");
      for ($k = 0; $k < count($matrix[0]); $k++){
          echo("<td>" . $matrix[$i][$k] . "</td>");
      }
      echo("</tr>");
  }
  echo("</table>");
  }

//Definimos funcion para multiplicar vectores por matrices
function matrixMult($m1, $m2){
  //Comprobamos si m1 tiene el mismo numero de columnas que m2 filas
  if (count($m1[0]) == count($m2)){
      $matrix = [];
      for ($row = 0; $row < count($m1); $row++){
          $temp = [];
          for ($col = 0; $col < count($m2[0]); $col++){
              $dotproduct = 0;
              for ($k = 0; $k < count($m1[0]); $k++){
                  $dotproduct += $m1[$row][$k] * $m2[$k][$col];
              }
              array_push($temp, $dotproduct);
          }
          array_push($matrix, $temp);
      }
  }
  return $matrix;
}

//Definimos la funcion para calcular las pendientes <<
function slope($A, $B){
  $ABv = [$B[0][0] - $A[0][0], $B[1][0] - $A[1][0]];
  $slope = $ABv[1] / $ABv[0];
  return $slope;
}
?>