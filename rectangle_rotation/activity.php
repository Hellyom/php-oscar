<?php
require("functions.php");
function rectangle_rotation($a, $b): int {
  
  //Definimos todas las esquinas en base a los lados del rectangulo, suponiendo que el centro del rectangulo esta en 0,0 <<
  //Las esquinas estan nombradas de izquierda arriba, en sentido horario.
  $corner1 = [ [-($a/2)], [   $b/2]];
  $corner2 = [ [ ($a/2)], [   $b/2]];
  $corner3 = [ [ ($a/2)], [-($b/2)]];
  $corner4 = [ [-($a/2)], [-($b/2)]];
  
  //Definimos la matriz rotacion de 45 grados clockwise
  $rotation = 45;
  $rotmatrix = [[cos($rotation), sin($rotation)]
               ,[-sin($rotation), cos($rotation)]];

  //Rotamos los puntos de las esquinas con la matriz rotacion.
  $corner1 = matrixMult($rotmatrix, $corner1);
  $corner2 = matrixMult($rotmatrix, $corner2);
  $corner3 = matrixMult($rotmatrix, $corner3);
  $corner4 = matrixMult($rotmatrix, $corner4);

  //Despues de aplicar la rotacion, definimos los 2 puntos mas a la "derecha" e "izquierda", se puede hacer facilmente con el angulo de rotacion.
  $leftCorner;
	$topCorner;
  $rightCorner;
	$botCorner;

  if (0 < $rotation && $rotation < 90) {
    $leftCorner = $corner4;
		$topCorner = $corner1;
    $rightCorner = $corner2;
		$botCorner = $corner3;
  }
  else if (90 < $rotation && $rotation < 180) {
    $leftCorner = $corner3;
		$topCorner = $corner4;
    $rightCorner = $corner1;
		$botCorner = $corner2;
  }
  else if (180 < $rotation && $rotation < 270) {
    $leftCorner = $corner2;
		$topCorner = $corner3;
    $rightCorner = $corner4;
		$botCorner = $corner1;
  } else {
    $leftCorner = $corner1;
		$topCorner = $corner2;
    $rightCorner = $corner3;
		$botCorner = $corner4;
  }

  //Definimos las pendientes de todos los lados <<
  $slopeLT = slope($leftCorner, $topCorner);
  $slopeLB = slope($leftCorner, $botCorner);
  $slopeRT = slope($rightCorner, $topCorner);
  $slopeRB = slope($rightCorner, $botCorner);

  //Para comprobar si un punto esta dentro del rectangulo, tenemos que comprobar la pendiente de las 4 lineas que unen el punto P con los puntos corner1, corner2...
  //Tenemos que seleccionar una zona en la que probar puntos. Encontramos las coordenadas X e Y mas bajas y altas
  $lowX =  min($corner1[0][0], $corner2[0][0], $corner3[0][0], $corner4[0][0]);
  $highX = max($corner1[0][0], $corner2[0][0], $corner3[0][0], $corner4[0][0]);
  $lowY =  min($corner1[1][0], $corner2[1][0], $corner3[1][0], $corner4[1][0]);
  $highY = max($corner1[1][0], $corner2[1][0], $corner3[1][0], $corner4[1][0]);

  //Teniendo los limites del rectangulo imaginario, probamos los puntos. <<
  $npoints = 0;
  for ($y = ceil($lowY); $y <= floor($highY); $y++){
    for ($x = ceil($lowX); $x <= floor($highX); $x++){
      //Nos saltamos las coordenadas cuyas X esten fuera de los limites del rectangulo imaginario y tengan Y = 0, estos puntos dan pendiente 0 y dan falsos positivos  

      //Comprobamos si el punto esta dentro del rectangulo
      $P = [[$x], [$y]];
      if ( $slopeLB <= slope($leftCorner, $P) AND slope($leftCorner, $P) <= $slopeLT  AND  $slopeRB >= slope($rightCorner, $P) AND slope($rightCorner, $P) >= $slopeRT ){
        $npoints++;
        matrixTable($P);
        echo("--------");
			}
    }
  }
	return $npoints;
  }

echo(rectangle_rotation(30, 2));
?>
<html>
<head><style>table, td{border: 1px solid; text-align: center;}</style><head>
<body><body>
<html>