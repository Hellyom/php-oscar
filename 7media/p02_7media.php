<?php
  /* Nombre Alumno: Oscar Chrusciel Brozek */
  include "p02func.php";

  $ogCardStack = getCardStack("images");
  $cardStack = $ogCardStack;
  shuffle($cardStack);

  $players = [];

  $jug1 = createPlayer($_POST["nombre1"], $cardStack, $_POST["numcartas"]);
  $cardStack = array_splice($cardStack, 4, -1);
  array_push($players, $jug1);
  
  $jug2 = createPlayer($_POST["nombre2"], $cardStack, $_POST["numcartas"]);
  $cardStack = array_splice($cardStack, 4, -1);
  array_push($players, $jug2);
  
  $jug3 = createPlayer($_POST["nombre3"], $cardStack, $_POST["numcartas"]);
  $cardStack = array_splice($cardStack, 4, -1);
  array_push($players, $jug3);
  
  $jug4 = createPlayer($_POST["nombre4"], $cardStack, $_POST["numcartas"]);
  $cardStack = array_splice($cardStack, 4, -1);
  array_push($players, $jug4);
  
  $game = playGame($players, $_POST["apuesta"]);

  printTablePlayers($players);
  printPlayers($players);
  printWinners($game["winners"], $game["prize"]);

  registerRound("apuestas.txt", $players, $game);

?>