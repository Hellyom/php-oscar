<HTML>
<HEAD><TITLE> EJ6AM </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php
$matrix = [[],[],[]];
$max = [];
$averages = [];

$filas = 3;
$columnas = 3;


//Generar numeros en 
for ($i = 0; $i < $filas; $i++){
    for ($k = 0; $k < $columnas; $k++){
        $matrix[$i][$k] = random_int(0,100);
    }
}
//Valores maximos
for ($i = 0; $i < $filas; $i++){
    $arraymaxn = 0;
    for ($k = 0; $k < $columnas; $k++){
        if ($matrix[$i][$k] > $arraymaxn) {$arraymaxn = $matrix[$i][$k];}
    }
    array_push($max, $arraymaxn);
}

//Generar tabla en html
echo("<table>");
for ($i = 0; $i < $filas; $i++){
    echo("<tr>");
    for ($k = 0; $k < $columnas; $k++){
        echo("<td>" . $matrix[$i][$k] . "</td>");
    }
    echo("</tr>");
}
echo("</table>");

//Generar valores medios
for ($i = 0; $i < $filas; $i++){
    array_push($averages, round((array_sum($matrix[$i]) / count($matrix[$i])),2));
}


//Enseñar valores máximos
echo("<br>");
echo(implode("|", $max));

//Enseñar valores medios
echo("<br>");
echo(implode("|", $averages));
?>
</BODY>
</HTML>