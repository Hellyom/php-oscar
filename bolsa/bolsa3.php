<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    .form-style-2{
      max-width: 500px;
      padding: 20px 12px 10px 20px;
      font: 13px Arial, Helvetica, sans-serif;
    }
    .form-style-2-heading{
      font-weight: bold;
      font-style: italic;
      border-bottom: 2px solid #ddd;
      margin-bottom: 20px;
      font-size: 15px;
      padding-bottom: 3px;
    }
    .form-style-2 label{
      display: block;
      margin: 0px 0px 15px 0px;
    }
    .form-style-2 label > span{
      width: 100px;
      font-weight: bold;
      float: left;
      padding-top: 8px;
      padding-right: 5px;
    }
    .form-style-2 span.required{
      color:red;
    }
    .form-style-2 .tel-number-field{
      width: 40px;
      text-align: center;
    }
    .form-style-2 input.input-field, .form-style-2 .select-field{
      width: 48%;	
    }
    .form-style-2 input.input-field, 
    .form-style-2 .tel-number-field, 
    .form-style-2 .textarea-field, 
     .form-style-2 .select-field{
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      border: 1px solid #C2C2C2;
      box-shadow: 1px 1px 4px #EBEBEB;
      -moz-box-shadow: 1px 1px 4px #EBEBEB;
      -webkit-box-shadow: 1px 1px 4px #EBEBEB;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      padding: 7px;
      outline: none;
    }
    .form-style-2 .input-field:focus, 
    .form-style-2 .tel-number-field:focus, 
    .form-style-2 .textarea-field:focus,  
    .form-style-2 .select-field:focus{
      border: 1px solid #0C0;
    }
    .form-style-2 .textarea-field{
      height:100px;
      width: 55%;
    }
    .form-style-2 input[type=submit],
    .form-style-2 input[type=button]{
      border: none;
      padding: 8px 15px 8px 15px;
      background: #FF8500;
      color: #fff;
      box-shadow: 1px 1px 4px #DADADA;
      -moz-box-shadow: 1px 1px 4px #DADADA;
      -webkit-box-shadow: 1px 1px 4px #DADADA;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
    }
    .form-style-2 input[type=submit]:hover,
    .form-style-2 input[type=button]:hover{
      background: #EA7B00;
      color: #fff;
    }
  </style>
  <!-- https://www.sanwebe.com/2014/08/css-html-forms-designs  -->
  <title>Bolsa3</title>
</head>
<body>
  <div class="form-style-2">
    <div class="form-style-2-heading">Rellena el formulario</div>
    <form action="bolsa3.php" method="post">
    <label for="valores"><span>Valores Búrsatiles</span>
      <select name="accion" class="select-field">
      <?php
        include "funciones_bolsa.php";
        genOptions(findStockNames("ibex35.txt"));
      ?>
      </select>
    </label>
    <input type="submit" value="Submit" />
    </form>
    </div>
    <?php
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo("El valor Cotización de ".$_POST["accion"]." es ". searchValue("ibex35.txt", $_POST["accion"], "Ultimo")); echo("<br>");
        echo("Cotización Máxima de ".$_POST["accion"]." es ". searchValue("ibex35.txt", $_POST["accion"], "MAx.")); echo("<br>");
        echo("Cotización Mínima de ".$_POST["accion"]." es ". searchValue("ibex35.txt", $_POST["accion"], "MIn.")); 
      }
    ?>
</body>
</html>