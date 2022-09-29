<HTML>
<HEAD><TITLE> EJ3AM </TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$matrix =     [[2,4,6,23,7],
              [8,10,12,87,2],
              [14,16,18,9,123]];

              
$columnas = [ ];
$filas = [];

//col
for ($i = 0; $i < count($matrix[0]); $i++){
    for ($k = 0; $k < count($matrix); $k++){
        array_push($columnas, $matrix[$k][$i]);
    }
}    

echo(implode("|", $columnas));

//fila
for ($i = 0; $i < count($matrix); $i++){
    for($k = 0; $k < count($matrix[$i]); $k++){
        array_push($filas, $matrix[$i][$k]);
    }
}

echo("<br>");
echo(implode("|", $filas));
?>
</BODY>
</HTML>