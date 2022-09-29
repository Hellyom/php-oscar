<HTML>
<HEAD><TITLE> EJ5AM </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php
$matrix = [[],[],[]];

$filas = 5;
$columnas = 5;

for ($i = 0; $i < $filas; $i++){
    for ($k = 0; $k < $columnas; $k++){
        $matrix[$i][$k] = $i + $k;
    }
}    

echo("<table>");
for ($i = 0; $i < $filas; $i++){
    echo("<tr>");
    for ($k = 0; $k < $columnas; $k++){
        echo("<td>" . $matrix[$i][$k] . "</td>");
    }
    echo("</tr>");
}
echo("</table>");

?>
</BODY>
</HTML>