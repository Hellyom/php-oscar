<HTML>
<HEAD><TITLE> EJ8AM </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php

$m1 = createMatrix(3,3,5);
matrixTable($m1);
$m2 = createMatrix(3,3,5);
matrixTable($m2);
echo("<br>");
echo("Suma");
matrixTable(matrixSum($m1, $m2));
echo("<br>");
echo("Multiplicacion");
matrixTable(matrixMult($m1, $m2));


function createMatrix($rows, $col, $maxValue){
    $matrix = [];
    for ($i = 0; $i < $rows; $i++){
        $row = [];
        for ($j = 0; $j < $col; $j++){
            array_push($row, rand(0, $maxValue));
        }
        array_push($matrix, $row);
    }
    return $matrix;
}

function matrixTable($matrix){
    echo("<table>");
    for ($i = 0; $i < count($matrix); $i++){
        echo("<tr>");
        for ($k = 0; $k < count($matrix[0]); $k++){
            echo("<td>" . $matrix[$i][$k] . "</td>");
        }
        echo("</tr>");
    }
    echo("</table>");
    }

function matrixSum($m1, $m2){
    $m3 = $m1;
    for ($row = 0; $row < count($m1); $row++){
        for ($col = 0; $col < count($m1[0]); $col++){
            $m3[$row][$col] = $m1[$row][$col] + $m2[$row][$col];
        }
    }
    return $m3;
}    

function matrixMult($m1, $m2){
    //Comprobamos si m1 tiene el mismo numero de columnas que m2 filas
    if (count($m1[0]) == count($m2)){
        $matrix = [];
        for ($row = 0; $row < count($m1); $row++){
            $temp = [];
            for ($col = 0; $col < count($m2[0]); $col++){
                $dotproduct = 0;
                for ($k = 0; $k < count($m1[0]); $k++){
                    $dotproduct += $m1[$row][$k] * $m2[$k][$col];
                }
                array_push($temp, $dotproduct);
            }
            array_push($matrix, $temp);
        }
    }
    return $matrix;
}

?>
</BODY>
</HTML>