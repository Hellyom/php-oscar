<?php
function valGameConfig($nCards, $nPlayers){
    return ($nCards > 2) AND ($nCards * $nPlayers <= 40);
}

function getCardStack($dir){ //Accepts dir of images, Returns array full stack of cards
    $cardStack = [];
    $pattern = "/([A-Za-z\d]{2}\.PNG)/"; //File type
    //If $dir exists, proceed
    if (is_dir($dir)) {
      //If opendir is able to open dir and read content, proceed
      if ($dh = opendir($dir)){
        while (($filename = readdir($dh)) !== false){
            //If file name matches pattern, add to stack. 
          if (preg_match($pattern, $filename)) {
            array_push($cardStack,["valor" => $filename[0],
                                   "palo"  => $filename[1]]);
          }
        }
      }
    }
    return $cardStack;
  } 


function calPoints($cards){ //Accepts players cards to calculate points, return int
    $points = 0;

    //Add points
    foreach ($cards as $card){
        if (is_numeric($card["valor"])){
            $points += intval($card["valor"]);
        }
        else {
            $points += 0.5;
        }
    }
    return $points;
}

function playGame($players, $prize){ //Accepts array of players, returns winners and prizes
    $game = ["winners" => [], "prize" => 0];
    $maxPoints = 0;
    foreach ($players as $pl){
        if ($pl["puntos"] > 7.5){
            continue;
        } 
        elseif ($pl["puntos"] > $maxPoints){
            $game["winners"] = [$pl["nombre"]];
            $maxPoints = $pl["puntos"];
        } 
        elseif ($pl["puntos"] == $maxPoints){
            array_push($game["winners"], $pl["nombre"]);
        }
    }

    if (count($game["winners"]) == 0) {return $game;}
    
    if ($maxPoints != 7.5){
        $game["prize"] = $prize * 0.5 / count($game["winners"]);
    }
    elseif ($maxPoints == 7.5){
        $game["prize"] = $prize / count($game["winners"]);
    }
    
    return $game;
}

function createPlayer($nCardsame, $cardStack, $nCardsCards){ //Returns associatve array of player
return (["nombre" => $nCardsame,
         "cartas" => ($cards = array_slice($cardStack, 0, $nCardsCards)),
         "puntos" => calPoints($cards)]);
}


function registerRound($url, $players, $game){ //Creates reg file

        $file = fopen($url, "w");
        fwrite($file, "name,points,prize\n");
        foreach ($players as $pl){
            fwrite($file, $pl["nombre"] .",". $pl["puntos"] .",");
            if (in_array($pl["nombre"], $game["winners"])){
                fwrite($file, $game["prize"]);
            }
            fwrite($file, "\n");
        }
    }
    
function printTablePlayers($players){ //Accepts array of players
    echo("<table>");
    foreach ($players as $pl){
        echo("<tr>");
        echo("<td>");
        echo($pl["nombre"]);
        echo("</td>");
        for ($i = 0; $i < count($pl["cartas"]); $i++){
            echo("<td>");
            echo("<img src=images/" . $pl["cartas"][$i]["valor"] . $pl["cartas"][$i]["palo"] . ".PNG>");
            echo("</td>");
        }
        echo("</tr>");
    }
    echo("</table>");
}

function printPlayers($players){ //Accepts array of players
    echo("<br>");
    foreach ($players as $pl){
        echo($pl["nombre"] . " = " . $pl["puntos"]);
        echo("<br>");   
    }
}

//Print names of winners
function printWinners($winners, $prize){
    echo("<br>");
    echo("<br>");

    if (count($winners) == 1) {
        echo("El ganador ha sido " . $winners[0] . " y ha ganado $prize lereles");
        echo("<br>");
    }
    else if (count($winners) == 0){
        echo("No ha ganado nadie, se aumenta el bote");
    }
    else {
        echo("Los ganadores han sido " . implode(", ", $winners) . "y han ganado $prize lereles cada uno");
        echo("<br>");
    }
}

?>