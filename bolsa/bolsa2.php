<HTML>
<HEAD><TITLE> Bolsa1 </TITLE><style>table, td{border: 1px solid; text-align: center;}</style></HEAD>
<BODY>
<?php
  include "funciones_bolsa.php";

  printArray(stockValues($_POST["nombrevalor"], "ibex35.txt"));
?>
</BODY>
</HTML>

