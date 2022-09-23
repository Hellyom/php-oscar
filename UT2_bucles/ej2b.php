<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php
  $num="98465165322";
  $base="9";

  $resultado = "";
  while($num / $base != 0){
    #echo("$num<br>");
    $resultado = ($num % $base) . $resultado;
    $num = (int) ($num / $base);
  }
  echo("<h1>$resultado</h1>");
?>
</BODY>
</HTML>
