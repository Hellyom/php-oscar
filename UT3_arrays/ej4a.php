<HTML>
<HEAD><TITLE> EJ4A</TITLE><style>table, td{border: 1px solid;}</style></HEAD>
<BODY>
<?php
$binnums = [0, 1, 10, 11, 100, 101, 110, 111, 1000, 1001, 1010, 1011, 1100, 1101, 1110, 1111, 10000, 10001, 10010, 10011];

#$binnums = reverse_array($binnums);

for($j = 0; $j < count($binnums) / 2; ++$j){
    $lastn = 0;
    $lastn = $binnums[count($binnums) - $j - 1];
    $binnums[count($binnums) - $j - 1] = $binnums[$j];
    $binnums[$j] = $lastn;
}

echo("<table>");
echo("<tr><td>Indice</td><td>Binario</td><td>Octal</td></tr>");
for ($i = 0; $i < count($binnums); $i++){
    echo("<tr>");
    echo("<td>".$i."</td>");
    echo("<td>".$binnums[$i]."</td>");
    echo("<td>".decoct(bindec($binnums[$i]))."</td>");
    echo("</tr>");
}
echo("</table>");

?>
</BODY>
</HTML>