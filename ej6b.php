<HTML>
<HEAD><TITLE> EJ6B – Factorial</TITLE></HEAD>
<BODY>
<?php
$num="15";
$resultado = 1;

$num = abs($num); #Haciendolo un numero positivo para que no de errores, -12! daria 12!

echo("$num"."!"." = ");
for ($i = $num; $i > 0; $i--){
  if ($i > 1) {echo($num . " x ");} else {echo($num . " = ");};
  $resultado *= $num;
  $num -= 1;
}

echo($resultado)
?>
</BODY>
</HTML>