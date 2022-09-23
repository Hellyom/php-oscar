<HTML>
<HEAD><TITLE> EJ5B – Tabla multiplicar con TD</TITLE><style>
  table, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style></HEAD>
<BODY>
<?php
$num="52";

echo("<table>");

for ($i = 1; $i <= 10; $i++){
  echo("<tr>");
  echo("<td>". $num . " x " . $i ."</td>");
  echo("<td>". $num*$i ."</td>");
  echo("</tr>");
}

echo("</table>");
?>
</BODY>
</HTML
