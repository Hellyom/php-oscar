<HTML>
<HEAD><TITLE> EJ2A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$numimp = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39];
$even = ["sum" => 0, "n" => 0];
$uneven = ["sum" => 0, "n" => 0];  

echo("<table>");
for ($i = 0; $i < count($numimp); $i++){
    if ($i % 2 == 0){
        $even["sum"] += $numimp[$i];
        $even["n"] += 1; 
    } else {
        $uneven["sum"] += $numimp[$i];
        $uneven["n"] += 1;
    }
}
echo("<tr><td>Even Average</td><td>Uneven Average</td></tr>");
echo("<tr><td>".$even["sum"] / $even["n"]."</td><td>".$uneven["sum"] / $uneven["n"]."</td></tr>");
echo("</table>");

?>
</BODY>
</HTML>