<HTML>
<HEAD><TITLE> EJ1AM </TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$multiplos = [[2,4,6],
              [8,10,12],
              [14,16,18]];


echo("<table>");
for ($i = 0; $i < count($multiplos); $i++){
    echo("<tr>");
    for ($k = 0; $k < count($multiplos[$i]); $k++){
        echo("<td>" . $multiplos[$i][$k] . "</td>");
    }
    echo("</tr>");
}
echo("</table>");

?>
</BODY>
</HTML>