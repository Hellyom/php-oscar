<HTML>
<HEAD><TITLE> EJ9AMF </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php
$m1 = createMatrix(2,2,5);
matrixTable($m1);
$m2 = createMatrix(2,2,5);
matrixTable($m2);
echo("<br>");
echo("Suma");
matrixTable(matrixSum($m1, $m2));
echo("<br>");
echo("Multiplicacion");
matrixTable(matrixMult($m1, $m2));
?>

<?
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

function matrixTrans($m) {
    $t = matrixCreate(count($m), count($m[0], 0))
    for ($row = 0; $row < count($m); $row++){
        for ($col = 0; $col < count($m[0]); $col++){
            
        }
    }
}
?>
</BODY>
</HTML>