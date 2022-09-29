<HTML>
<HEAD><TITLE> EJ2AM </TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$multiplos = [[2,4,6],
              [8,10,12],
              [14,16,18]];

              
$sumacol = [];              
$sumafilas = [];

//suma col
for ($i = 0; $i < count($multiplos[0]); $i++){
    $temp = 0;
    for ($k = 0; $k < count($multiplos); $k++){
        $temp += $multiplos[$k][$i];
    }
    array_push($sumacol, $temp);
}    

//suma fila
for ($i = 0; $i < count($multiplos); $i++){
    array_push($sumafilas, array_sum($multiplos[$i]));
}


//tabla columnas
echo("<table>");
echo("<tr>");
for ($i = 0; $i < count($multiplos); $i++){
    echo("<td>");
    echo($sumacol[$i]);
    echo("</td>");
}
echo("</tr>");
echo("</table>");

echo("<br>");

//tabla filas
echo("<table>");
for ($i = 0; $i < count($multiplos); $i++){
    echo("<tr>");
    echo("<td>");
    echo($sumafilas[$i]);
    echo("</td>");
    echo("</tr>");
}
echo("</table>");

?>
</BODY>
</HTML>