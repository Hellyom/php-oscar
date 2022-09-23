<HTML>
<HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
<BODY>
<?php
  $num="658489255";
  $base="16";
  $letters=['A','B','C','D','E','F'];

  $resultado = "";
  while($num / $base != 0){
    $trans = 0;
    $trans = ($num % $base);
    if ($trans > 9){
      $trans = $letters[$trans - 10];
    }
    $resultado = $trans . $resultado;
    $num = (int) ($num / $base);  
  }
  echo("<h1>$resultado</h1>");
?>
</BODY>
</HTML>
