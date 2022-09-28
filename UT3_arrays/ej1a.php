<HTML>
<HEAD><TITLE> EJ1A – Primero 20 num impares</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$numimp = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39];
$suma = 0;

echo("<table>");
echo("<tr><td>Indice</td><td>Valor</td><td>Suma</td></tr>");
for ($i = 0; $i < count($numimp); $i++){
    $suma += $numimp[$i];
    echo("<tr>");
    echo("<td>".$i."</td>");
    echo("<td>".$numimp[$i]."</td>");
    echo("<td>".$suma."</td>");
    echo("</tr>");
}
echo("</table>");

?>
</BODY>
</HTML>